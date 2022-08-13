<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// User login and registration
Route::get('/users', [UserController::class, 'index']);
Route::post('/users/login', [UserController::class, 'login']);
Route::get('/users/new', [UserController::class, 'register']);
Route::post('/users/create', [UserController::class, 'create']);
Route::post('/users/show/{id}', [UserController::class, 'show']);
Route::post('/users/update/{id}', [UserController::class, 'update']);
Route::post('/users/logout', [UserController::class, 'logout']);

// Dashboard
Route::get("/users/dashboard", [DashboardController::class, 'index']);

// Attendance
Route::get("/users/attendance", [AttendanceController::class, 'index']);
Route::post("/users/time_in/{id}", [AttendanceController::class, 'clockIn']);
Route::post("/users/time_out/{id}", [AttendanceController::class, 'clockOut']);