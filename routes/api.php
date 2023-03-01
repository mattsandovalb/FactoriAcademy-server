<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ExercicesController;

Route::apiResource('courses', \App\Http\Controllers\CoursesController::class);

Route::apiResource('users', \App\Http\Controllers\UsersController::class);

Route::apiResource('exercices', ExercicesController::class);