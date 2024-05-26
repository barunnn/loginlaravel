<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudyController;
use App\Http\Middleware\checkAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post("student", [StudentController::class, 'register']);

Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::post('refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
Route::post('me', [AuthController::class, 'me'])->middleware('auth:api');

Route::post('login', [AuthController::class, 'login']);
Route::get('autherror', [AuthController::class, 'autherror'])->name('login');
Route::post('register', [AuthController::class, 'register']);


Route::post('submitform', [StudyController::class, 'store']);
Route::post('amesubmitform', [StudyController::class, 'amestore']);
