<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/users/create', [UserController::class, 'create']);
Route::post('/users/login', [UserController::class, 'login']);

Route::post('/admin/time_in', [AttendanceController::class, 'time_in']);
Route::get('/admin/show_attendance', [AttendanceController::class, 'showAll']);

Route::post('/users/show', [NotificationController::class, 'show']);


Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/users/show', [UserController::class, 'show']);
    Route::post('/users/logout', [UserController::class, 'logout']);
    Route::post('/users/show_student_logs', [AttendanceController::class, 'getStudentLogs']);
    Route::post('/users/show_student_history', [AttendanceController::class, 'getLatestStudentLog']);

    Route::post('/admin/create_student', [StudentController::class, 'create']);
    // Route::post('/admin/time_in', [AttendanceController::class, 'time_in']);
    // Route::get('/admin/show', [AttendanceController::class, 'showAll']);
});