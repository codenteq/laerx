<?php

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

Route::get('/user/dashboard', [HomeController::class, 'getDashboard']);

Route::get('/user/lessons', [HomeController::class, 'getLessons']);

Route::get('/user/exams', [HomeController::class, 'getExams']);

Route::get('/user/class-exams', [HomeController::class, 'getClassExams']);

Route::get('/user/results', [HomeController::class, 'getResults']);

Route::get('/user/appointment', [HomeController::class, 'getAppointment']);

Route::get('/user/live-lessons', [HomeController::class, 'getLiveLessons']);

Route::get('/user/profile', [HomeController::class, 'getProfile']);

Route::get('/user/support', [HomeController::class, 'getSupport']);

Route::get('/user/notifications', [HomeController::class, 'getNotifications']);

Route::get('/manager/dashboard', [ManagerController::class, 'getManagerDashboard']);

Route::get('/manager/user-operations', [ManagerController::class, 'getManagerUserOperations']);

Route::get('/manager/user-results', [ManagerController::class, 'getManagerUserResults']);

Route::get('/manager/live-lessons', [ManagerController::class, 'getManagerLiveLessons']);

Route::get('/manager/course-teachers', [ManagerController::class, 'getManagerTeachers']);

Route::get('/manager/notifications', [ManagerController::class, 'getManagerNotifications']);

Route::get('/manager/supports', [ManagerController::class, 'getManagerSupports']);

Route::get('/manager/appointment', [ManagerController::class, 'getManagerAppointment']);

Route::get('/manager/user-add', [ManagerController::class, 'getManagerUserAdd']);

Route::get('/manager/user-list', [ManagerController::class, 'getManagerUserLİst']);

Route::get('/manager/live-lessons-add', [ManagerController::class, 'getManagerLiveLessonAdd']);

Route::get('/manager/course-teachers-add', [ManagerController::class, 'getManagerTeacherAdd']);

Route::get('/manager/cars-list', [ManagerController::class, 'getManagerCars']);

Route::get('/manager/cars-add', [ManagerController::class, 'getManagerCarsAdd']);

Route::get('/manager/appointment-list', [ManagerController::class, 'getManagerAppointmentList']);

Route::get('/manager/appointment-add', [ManagerController::class, 'getManagerAppointmentAdd']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
