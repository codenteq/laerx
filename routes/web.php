<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\User\HomeController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('dashboard', [HomeController::class, 'getDashboard'])->name('dashboard');
    Route::get('lessons', [HomeController::class, 'getLessons'])->name('lessons');
    Route::get('exams', [HomeController::class, 'getExams'])->name('exams');
    Route::get('class-exams', [HomeController::class, 'getClassExams'])->name('class-exams');
    Route::get('results', [HomeController::class, 'getResults'])->name('results');
    Route::get('appointment', [HomeController::class, 'getAppointment'])->name('appointment');
    Route::get('live-lessons', [HomeController::class, 'getLiveLessons'])->name('live-lessons');
    Route::get('profile', [HomeController::class, 'getProfile'])->name('profile');
    Route::get('support', [HomeController::class, 'getSupport'])->name('support');
    Route::get('notifications', [HomeController::class, 'getNotifications'])->name('notifications');
});

Route::prefix('manager')->name('manager.')->group(function () {
    Route::get('dashboard', [ManagerController::class, 'getManagerDashboard'])->name('dashboard');
    Route::get('user-operations', [ManagerController::class, 'getManagerUserOperations'])->name('user-operations');
    Route::get('user-results', [ManagerController::class, 'getManagerUserResults'])->name('user-results');
    Route::get('live-lessons', [ManagerController::class, 'getManagerLiveLessons'])->name('live-lessons');
    Route::get('course-teachers', [ManagerController::class, 'getManagerTeachers'])->name('course-teachers');
    Route::get('notifications', [ManagerController::class, 'getManagerNotifications'])->name('notifications');
    Route::get('supports', [ManagerController::class, 'getManagerSupports'])->name('supports');
    Route::get('appointment', [ManagerController::class, 'getManagerAppointment'])->name('appointment');
    Route::get('user-add', [ManagerController::class, 'getManagerUserAdd'])->name('user-add');
    Route::get('user-list', [ManagerController::class, 'getManagerUserList'])->name('user-list');
    Route::get('live-lessons-add', [ManagerController::class, 'getManagerLiveLessonAdd'])->name('live-lessons-add');
    Route::get('course-teachers-add', [ManagerController::class, 'getManagerTeacherAdd'])->name('course-teachers-add');
    Route::get('cars-list', [ManagerController::class, 'getManagerCars'])->name('cars-list');
    Route::get('cars-add', [ManagerController::class, 'getManagerCarsAdd'])->name('cars-add');
    Route::get('appointment-list', [ManagerController::class, 'getManagerAppointmentList'])->name('appointment-list');
    Route::get('appointment-add', [ManagerController::class, 'getManagerAppointmentAdd'])->name('appointment-add');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'getAdminDashboard'])->name('dashboard');
    Route::get('group', [AdminController::class, 'getAdminGroup'])->name('group');
    Route::get('group-add', [AdminController::class, 'getAdminGroupAdd'])->name('group-add');
    Route::get('period', [AdminController::class, 'getAdminPeriod'])->name('period');
    Route::get('period-add', [AdminController::class, 'getAdminPeriodAdd'])->name('period-add');
    Route::get('users-add', [AdminController::class, 'getAdminUsersAdd'])->name('users-add');
    Route::get('users', [AdminController::class, 'getAdminUsers'])->name('users');
    Route::resource('language', LanguageController::class);
    Route::resource('company', CompanyController::class);
});
