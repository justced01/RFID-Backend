<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;

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

Route::post('/time_in', [AttendanceController::class, 'time_in']);
Route::get('/show', [AttendanceController::class, 'showAll']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/users/show', [UserController::class, 'show']);
    Route::post('/users/logout', [UserController::class, 'logout']);
});