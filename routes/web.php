<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LessonContentController;
use App\Http\Controllers\Admin\ManagerUserController;
use App\Http\Controllers\Admin\PeriodController;
use App\Http\Controllers\Admin\QuestionTypeController;
use App\Http\Controllers\Manager\AppointmentController;
use App\Http\Controllers\Manager\CarController;
use App\Http\Controllers\Manager\ClassExamController;
use App\Http\Controllers\Manager\CourseTeacherController;
use App\Http\Controllers\Manager\LiveLessonController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\NotificationController;
use App\Http\Controllers\Manager\QuestionController;
use App\Http\Controllers\Manager\SalesController;
use App\Http\Controllers\Manager\SupportController;
use App\Http\Controllers\Manager\UserController;
use App\Http\Controllers\Teacher\ProfileController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LessonController;
use App\Http\Controllers\User\QuizController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'login' => true,
    'logout' => false,
    'register' => false,
    'reset' => true,  // for resetting passwords
    'confirm' => true,  // for additional password confirmations
    'verify' => true,  // for email verification
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/redirect', [App\Http\Controllers\HomeController::class, 'redirect'])->name('redirect');
Route::get('/logout-user', [App\Http\Controllers\HomeController::class, 'logoutUser'])->name('logout-user');

Route::get('/city/{countryId?}', [App\Http\Controllers\HomeController::class, 'getCity'])->name('city');
Route::get('/state/{cityId?}', [App\Http\Controllers\HomeController::class, 'getState'])->name('state');

Route::post('coupon-code/{companyId?}', [\App\Http\Controllers\HomeController::class, 'postCouponCode'])->middleware('auth')->name('coupon.code');


Route::prefix('user')->name('user.')->middleware(['auth', 'check.role', 'check.user.status', 'check.invoice.status'])->group(function () {
    Route::get('dashboard', [HomeController::class, 'getDashboard'])->name('dashboard');

    Route::get('exams', [HomeController::class, 'getExams'])->name('exams');
    Route::get('class-exams', [HomeController::class, 'getClassExams'])->name('class-exams');
    Route::get('custom-exam-setting', [HomeController::class, 'getCustomExamSetting'])->name('custom-exam-setting');

    Route::get('/result', [HomeController::class, 'getResults'])->name('results');
    Route::get('/result/details/{detailId}', [HomeController::class, 'getResultDetail'])->name('result.detail');
    Route::resource('appointment', \App\Http\Controllers\User\AppointmentController::class);
    Route::resource('lesson', LessonController::class);
    Route::get('live-lessons', [HomeController::class, 'getLiveLessons'])->name('live-lessons');
    Route::get('profile', [HomeController::class, 'getProfile'])->name('profile');
    Route::put('profile', [HomeController::class, 'postProfileUpdate'])->name('profile.update');
    Route::get('support', [HomeController::class, 'getSupport'])->name('support');
    Route::post('support/create', [HomeController::class, 'postSupportStore'])->name('support.store');
    Route::get('notifications', [HomeController::class, 'getNotifications'])->name('notifications');
    Route::post('token', [HomeController::class, 'token'])->name('token');

    Route::name('quiz.api.')->group(function () {
        Route::get('/normal-exam/fetchQuestion', [QuizController::class, 'fetchNormalExam'])->name('normal');
        Route::get('/custom-exam/fetchQuestion', [QuizController::class, 'fetchCustomExam'])->name('custom');
        Route::get('/class-exam/fetchQuestion', [QuizController::class, 'fetchClassExam'])->name('class');
        Route::get('/fetchUserAndTest', [QuizController::class, 'fetchUserAndTest']);
        Route::post('/postUserAnswer', [QuizController::class, 'postUserAnswer'])->name('user-answer.store');
    });

    Route::name('quiz.')->group(function () {
        Route::get('/normal-exam', [QuizController::class, 'getNormalExam'])->name('normal');
        Route::get('/custom-exam', [QuizController::class, 'getCustomExam'])->name('custom');
        Route::get('/class-exam', [QuizController::class, 'getClassExam'])->name('class');
    });
});

Route::prefix('manager')->name('manager.')->middleware(['auth', 'check.role', 'check.user.status', 'check.invoice.status'])->group(function () {
    Route::get('dashboard', [ManagerController::class, 'getManagerDashboard'])->name('dashboard');

    Route::get('profile', [ManagerController::class, 'getProfile'])->name('profile.edit');
    Route::put('profile/update', [ManagerController::class, 'updateProfile'])->name('profile.update');

    Route::get('company', [ManagerController::class, 'getCompany'])->name('company.edit');
    Route::put('company/update', [ManagerController::class, 'updateCompany'])->name('company.update');

    Route::post('pay-callback/{companyId}/{couponId?}', [SalesController::class, 'payOnlineCallback'])->name('pay.callback');
    Route::get('online-pay', [SalesController::class, 'payOnline'])->name('pay.online');
    Route::resource('invoice', SalesController::class);

    Route::get('/user/excel-export', [UserController::class, 'exportExcel'])->name('user.excel-export');
    Route::get('/user/excel-import', [UserController::class, 'getImportExcel'])->name('user.excel-import');
    Route::post('/user/excel-import/create', [UserController::class, 'postImportExcel'])->name('user.excel-import.create');
    Route::get('user/operations', [UserController::class, 'getManagerUserOperations'])->name('user.operations');
    Route::get('user/results', [UserController::class, 'getManagerUserResults'])->name('user.results');
    Route::get('user/result/detail/{resultId}', [UserController::class, 'getManagerUserResultDetail'])->name('user.result.detail');
    Route::resource('user', UserController::class);
    Route::resource('live-lesson', LiveLessonController::class);
    Route::resource('course-teacher', CourseTeacherController::class);
    Route::resource('car', CarController::class);
    Route::get('appointment-car', [AppointmentController::class, 'getManagerAppointment'])->name('appointment-car');
    Route::post('appointment/setting/create', [AppointmentController::class, 'postAppointmentSetting'])->name('appointment.setting.store');
    Route::get('appointment/setting', [AppointmentController::class, 'getAppointmentSetting'])->name('appointment.setting');
    Route::resource('appointment', AppointmentController::class);
    Route::get('/support', [SupportController::class, 'index'])->name('support.index');
    Route::put('/support/{support}', [SupportController::class, 'update'])->name('support.update');
    Route::resource('question', QuestionController::class);
    Route::resource('notification', NotificationController::class);
    Route::name('class-exam.')->group(function () {
        Route::get('/class-exam', [ClassExamController::class, 'index'])->name('index');
        Route::get('/class-exam/create', [ClassExamController::class, 'create'])->name('create');
        Route::get('/class-exam/{classId}/edit', [ClassExamController::class, 'update'])->name('edit');
        Route::post('/class-exam', [ClassExamController::class, 'store'])->name('store');
        Route::delete('/class-exam/{classId}', [ClassExamController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('teacher')->name('teacher.')->middleware(['auth', 'check.role', 'check.user.status', 'check.invoice.status'])->group(function () {
    Route::resource('appointment', \App\Http\Controllers\Teacher\AppointmentController::class);
    Route::resource('profile', ProfileController::class);
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'check.role'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'getAdminDashboard'])->name('dashboard');
    Route::get('setting-dashboard', [AdminController::class, 'getSettingDashboard'])->name('setting.dashboard');
    Route::resource('language', LanguageController::class);
    Route::resource('company', CompanyController::class);
    Route::resource('group', GroupController::class);
    Route::resource('period', PeriodController::class);
    Route::resource('type', QuestionTypeController::class);
    Route::resource('manager-user', ManagerUserController::class);
    Route::resource('lesson-content', LessonContentController::class);
    Route::resource('coupon', CouponController::class);
    Route::get('invoice/show/{invoiceId}', [InvoiceController::class, 'getInvoiceShow'])->name('company.invoice.show');
    Route::get('invoice/{companyId}', [InvoiceController::class, 'getInvoice'])->name('company.invoice');
    Route::post('invoice/confirm-pay', [InvoiceController::class, 'postConfirmPay'])->name('company.invoice.confirm.pay');
    Route::get('profile', [AdminController::class, 'getProfile'])->name('profile.edit');
    Route::put('profile', [AdminController::class, 'updateProfile'])->name('profile.update');
});
