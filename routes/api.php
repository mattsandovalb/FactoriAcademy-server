<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;



Route::apiResource('courses', \App\Http\Controllers\CoursesController::class);

Route::apiResource('users', \App\Http\Controllers\UsersController::class);
