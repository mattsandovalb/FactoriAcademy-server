<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ExercicesController;

Route::apiResource('courses', CoursesController::class);

Route::apiResource('users', UsersController::class);

Route::apiResource('exercices', ExercicesController::class );