<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\StudentController;
use App\Events\ToasterNotification;
use App\Events\UpdateCountNotification;
use App\Events\UpdateStudentCard;

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

Route::post('/create', [UserController::class, 'create']); // Creating account
Route::post('/login', [UserController::class, 'login']); //Login account

Route::post('/admin/time_in', [AttendanceController::class, 'time_in']);
Route::post('/admin/time_out', [AttendanceController::class, 'time_out']);

Route::post('/admin/add_notification', [NotificationController::class, 'create']);
Route::get('/admin/show_attendance', [AttendanceController::class, 'showAll']);

// Events
Route::get('/admin/show_notification', function(){
    event(new ToasterNotification('Show Toaster'));
});
Route::get('/admin/update_count_notification', function(){
    event(new UpdateCountNotification('Update Counter Notification'));
});
Route::get('/admin/update_student_card', function(){
    event(new UpdateStudentCard('Update Student Card'));
});


Route::group(['middleware' => 'auth:api'], function () {

    Route::controller(UserController::class)->group(function () {
        Route::post('/users/show', 'show');
        Route::post('/users/logout', 'logout');
    });

    Route::controller(AttendanceController::class)->group(function () {
        Route::post('/users/get_student_logs', 'findStudentLogs');
        Route::post('/users/show_student_logs', 'getStudentLogs');
        Route::post('/users/show_student_history', 'getLatestStudentLog');
    });

    Route::controller(NotificationController::class)->group(function () {
        Route::post('/users/get_notification', 'findUserNotif');
    });

    Route::post('/admin/create_student', [StudentController::class, 'create']);

});