<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Course\CourseController;

Route::controller(CourseController::class)
    ->middleware('auth:api')
    ->group(function () {
        Route::get('courses', 'index');
        Route::get('courses/{course}', 'lessonShow');
        Route::post('courses/{course}/buy', 'buy');
    });