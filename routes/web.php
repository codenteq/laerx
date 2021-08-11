<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Manager\AppointmentController;
use App\Http\Controllers\Manager\CarsController;
use App\Http\Controllers\Manager\CourseTeachersController;
use App\Http\Controllers\Manager\LiveLessonsController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\UserController;
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

    Route::resource('user', UserController::class);
    Route::get('user-operations', [UserController::class, 'getManagerUserOperations'])->name('user-operations');
    Route::get('user-results', [UserController::class, 'getManagerUserResults'])->name('user-results');
    Route::resource('live-lessons', LiveLessonsController::class);
    Route::resource('course-teachers', CourseTeachersController::class);
    Route::resource('cars', CarsController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::get('appointment', [AppointmentController::class, 'getManagerAppointment'])->name('appointment');
    Route::get('notifications', [ManagerController::class, 'getManagerNotifications'])->name('notifications');
    Route::get('supports', [ManagerController::class, 'getManagerSupports'])->name('supports');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'getAdminDashboard'])->name('dashboard');
    Route::get('period', [AdminController::class, 'getAdminPeriod'])->name('period');
    Route::get('period-add', [AdminController::class, 'getAdminPeriodAdd'])->name('period-add');
    Route::get('users-add', [AdminController::class, 'getAdminUsersAdd'])->name('users-add');
    Route::get('users', [AdminController::class, 'getAdminUsers'])->name('users');
    Route::resource('language', LanguageController::class);
    Route::resource('company', CompanyController::class);
    Route::resource('group', GroupController::class);
});
