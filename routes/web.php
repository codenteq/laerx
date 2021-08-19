<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\ManagerUserController;
use App\Http\Controllers\Admin\PeriodController;
use App\Http\Controllers\Manager\AppointmentController;
use App\Http\Controllers\Manager\CarController;
use App\Http\Controllers\Manager\CourseTeacherController;
use App\Http\Controllers\Manager\LiveLessonController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\NotificationController;
use App\Http\Controllers\Manager\QuestionController;
use App\Http\Controllers\Manager\SupportController;
use App\Http\Controllers\Manager\UserController;
use App\Http\Controllers\User\HomeController;
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
    'login'    => true,
    'logout'   => false,
    'register' => false,
    'reset'    => true,  // for resetting passwords
    'confirm'  => true,  // for additional password confirmations
    'verify'   => true,  // for email verification
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout-user', [App\Http\Controllers\HomeController::class, 'logoutUser'])->name('logout-user');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('dashboard', [HomeController::class, 'getDashboard'])->name('dashboard');
    Route::get('lessons', [HomeController::class, 'getLessons'])->name('lessons');
    Route::get('exams', [HomeController::class, 'getExams'])->name('exams');
    Route::get('class-exams', [HomeController::class, 'getClassExams'])->name('class-exams');
    Route::get('results', [HomeController::class, 'getResults'])->name('results');
    Route::resource('appointment',\App\Http\Controllers\User\AppointmentController::class);
    Route::get('live-lessons', [HomeController::class, 'getLiveLessons'])->name('live-lessons');
    Route::get('profile', [HomeController::class, 'getProfile'])->name('profile');
    Route::put('profile', [HomeController::class, 'postProfileUpdate'])->name('profile.update');
    Route::get('support', [HomeController::class, 'getSupport'])->name('support');
    Route::post('support/create', [HomeController::class, 'postSupportStore'])->name('support.store');
    Route::get('notifications', [HomeController::class, 'getNotifications'])->name('notifications');
});

Route::prefix('manager')->name('manager.')->middleware('auth')->group(function () {
    Route::get('dashboard', [ManagerController::class, 'getManagerDashboard'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::get('user-operations', [UserController::class, 'getManagerUserOperations'])->name('user-operations');
    Route::get('user-results', [UserController::class, 'getManagerUserResults'])->name('user-results');
    Route::resource('live-lesson', LiveLessonController::class);
    Route::resource('course-teacher', CourseTeacherController::class);
    Route::resource('car', CarController::class);
    Route::get('appointment-car', [AppointmentController::class, 'getManagerAppointment'])->name('appointment-car');
    Route::post('appointment/setting/create', [AppointmentController::class, 'postAppointmentSetting'])->name('appointment.setting.store');
    Route::get('appointment/setting', [AppointmentController::class, 'getAppointmentSetting'])->name('appointment.setting');
    Route::resource('appointment', AppointmentController::class);
    Route::get('/support',[SupportController::class,'index'])->name('support.index');
    Route::put('/support/{support}',[SupportController::class,'update'])->name('support.update');
    Route::resource('question', QuestionController::class);
    Route::resource('notification', NotificationController::class);
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('dashboard', [AdminController::class, 'getAdminDashboard'])->name('dashboard');
    Route::resource('language', LanguageController::class);
    Route::resource('company', CompanyController::class);
    Route::resource('group', GroupController::class);
    Route::resource('period', PeriodController::class);
    Route::resource('manager-user', ManagerUserController::class);
});
