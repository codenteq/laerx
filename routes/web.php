<?php

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
