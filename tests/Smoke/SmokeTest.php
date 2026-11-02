<?php

namespace Tests\Smoke;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\Question;
use App\Models\User;
use App\Models\UserInfo;
use App\Services\ImageConvertService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

/**
 * Smoke tests written before the upgrade (on Laravel 10) so the same
 * flows can be checked after every major version step.
 *
 * They expect a database prepared with `php artisan migrate:fresh --seed`
 * (the seeders ship with the app) and roll back their own changes.
 */
class SmokeTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
        Cache::flush();
    }

    private function companyWithInvoice(int $invoiceStatus = 1): Company
    {
        $company = Company::create(['title' => 'Smoke School', 'subdomain' => 'smoke', 'status' => 1]);
        $planId = DB::table('payment_plans')->insertGetId(['month' => 1, 'description' => 'Monthly', 'created_at' => now(), 'updated_at' => now()]);
        $packageId = DB::table('packages')->insertGetId([
            'title' => 'Basic', 'description' => 'Smoke', 'price' => 100, 'planId' => $planId,
            'created_at' => now(), 'updated_at' => now(),
        ]);
        Invoice::create([
            'price' => 100, 'total_amount' => 100, 'start_date' => now()->subDay(), 'end_date' => now()->addMonth(),
            'companyId' => $company->id, 'packageId' => $packageId, 'status' => $invoiceStatus,
        ]);

        return $company;
    }

    private function userOfType(int $type, ?Company $company = null): User
    {
        $user = User::factory()->create(['type' => $type, 'tc' => (string) random_int(10000000000, 99999999999)]);
        UserInfo::create(['userId' => $user->id, 'companyId' => $company?->id, 'languageId' => 1, 'status' => 1]);

        return $user;
    }

    public function test_login_page_renders(): void
    {
        $this->get('/login')->assertOk()->assertSee('password', false);
    }

    public function test_user_can_log_in_with_tc_and_password(): void
    {
        $company = $this->companyWithInvoice();
        $user = $this->userOfType(User::Normal, $company);

        $this->post('/login', ['tc' => $user->tc, 'password' => 'password'])->assertRedirect();
        $this->assertAuthenticatedAs($user);
    }

    public function test_wrong_password_is_rejected(): void
    {
        $user = $this->userOfType(User::Normal, $this->companyWithInvoice());

        $this->post('/login', ['tc' => $user->tc, 'password' => 'wrong'])->assertSessionHasErrors();
        $this->assertGuest();
    }

    public function test_admin_dashboard_and_question_list_render(): void
    {
        $admin = $this->userOfType(User::Admin);

        $this->actingAs($admin)->get(route('admin.dashboard'))->assertOk();
        $this->actingAs($admin)->get(route('admin.question.index'))->assertOk();
        $this->actingAs($admin)->get(route('admin.company.index'))->assertOk();
    }

    public function test_manager_dashboard_and_user_list_render(): void
    {
        $company = $this->companyWithInvoice();
        $manager = $this->userOfType(User::Manager, $company);

        $this->actingAs($manager)->get(route('manager.dashboard'))->assertOk();
        $this->actingAs($manager)->get(route('manager.user.index'))->assertOk();
        $this->actingAs($manager)->get(route('manager.question.index'))->assertOk();
    }

    public function test_manager_with_unpaid_invoice_is_kept_out_of_other_pages(): void
    {
        $company = $this->companyWithInvoice(0);
        $manager = $this->userOfType(User::Manager, $company);

        $this->actingAs($manager)->get(route('manager.dashboard'))->assertOk();
        $this->actingAs($manager)->from(route('manager.dashboard'))
            ->get(route('manager.user.index'))->assertRedirect(route('manager.dashboard'));
    }

    public function test_manager_can_export_users_to_excel(): void
    {
        $company = $this->companyWithInvoice();
        $manager = $this->userOfType(User::Manager, $company);
        $this->userOfType(User::Normal, $company);

        $response = $this->actingAs($manager)->get(route('manager.user.excel-export'));
        $response->assertOk();
        $this->assertStringContainsString('users.xlsx', $response->headers->get('content-disposition'));
        $this->assertGreaterThan(1000, filesize($response->baseResponse->getFile()->getPathname()));
    }

    public function test_manager_can_create_a_question(): void
    {
        $company = $this->companyWithInvoice();
        $manager = $this->userOfType(User::Manager, $company);
        $title = 'Smoke question '.uniqid();

        $this->actingAs($manager)->post(route('manager.question.store'), [
            'title' => $title,
            'languageId' => 1,
            'typeId' => 1,
            'choice_text_1' => 'A', 'choice_text_2' => 'B', 'choice_text_3' => 'C', 'choice_text_4' => 'D',
            'correct_choice' => 2,
        ])->assertOk();

        $question = Question::where('title', $title)->first();
        $this->assertNotNull($question, 'question row was not stored');
        $this->assertSame(4, DB::table('question_choices')->where('questionId', $question->id)->count());
    }

    public function test_student_dashboard_and_exam_pages_render(): void
    {
        $company = $this->companyWithInvoice();
        $student = $this->userOfType(User::Normal, $company);

        $this->actingAs($student)->get(route('user.dashboard'))->assertOk();
        $this->actingAs($student)->get(route('user.exams'))->assertOk();
        $this->actingAs($student)->get(route('user.results'))->assertOk();
    }

    public function test_city_lookup_returns_json(): void
    {
        $user = $this->userOfType(User::Admin);
        $countryId = DB::table('countries')->value('id');

        $this->actingAs($user)->getJson(route('city', $countryId))->assertOk()->assertJsonStructure([['id']]);
    }

    public function test_uploaded_image_is_converted_to_webp(): void
    {
        $user = $this->userOfType(User::Normal, $this->companyWithInvoice());

        $png = imagecreatetruecolor(20, 20);
        ob_start();
        imagepng($png);
        Storage::disk('public')->put('users/avatar.png', ob_get_clean());

        app(ImageConvertService::class)->execute($user->id, 'user', 'users/avatar.png');

        try {
            Storage::disk('public')->assertExists('users/avatar.webp');
            Storage::disk('public')->assertMissing('users/avatar.png');
            $this->assertSame('image/webp', mime_content_type(storage_path('app/public/users/avatar.webp')));
            $this->assertSame('users/avatar.webp', UserInfo::where('userId', $user->id)->value('photo'));
        } finally {
            Storage::disk('public')->delete(['users/avatar.png', 'users/avatar.webp']);
        }
    }
}
