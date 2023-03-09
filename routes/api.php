<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ExercicesController;
use App\Http\Controllers\UsersController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});




Route::apiResource('courses', CoursesController::class);
Route::get('users/me', [UsersController::class, 'me']);
Route::apiResource('users', UsersController::class);
Route::apiResource('exercices', ExercicesController::class);
