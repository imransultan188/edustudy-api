<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CountryController;
use App\Http\Controllers\API\CourseAdditionalFeeController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\CourseHighlightController;
use App\Http\Controllers\API\CourseProgramStructureController;
use App\Http\Controllers\API\CourseYearlyFeeController;
use App\Http\Controllers\API\LevelController;
use App\Http\Controllers\API\UniversityController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::get('/countries', [CountryController::class, 'index']);

Route::get('/universities', [UniversityController::class, 'index']);

Route::get('/levels', [LevelController::class, 'index']);

Route::get('/courses', [CourseController::class, 'index']);

Route::get('/test', fn() => response()->json(['msg' => 'ok']));
Route::get('/testing', fn() => response()->json(['msg' => 'ok']));


Route::middleware('auth:api')->group(function () {

    Route::post('/add-university', [UniversityController::class, 'store']);
    Route::get('/university/{id}', [UniversityController::class, 'show']);
    Route::put('/update-university/{id}', [UniversityController::class, 'update']);
    Route::delete('/delete-university/{id}', [UniversityController::class, 'destroy']);

    Route::post('/add-level', [LevelController::class, 'store']);
    Route::put('/update-level/{id}', [LevelController::class, 'update']);
    Route::delete('/delete-level/{id}', [LevelController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/add-course', [CourseController::class, 'store']);
    Route::delete('/courses/{id}', [CourseController::class, 'destroy']);

    Route::post('/courses/{course}/highlights', [CourseHighlightController::class, 'store']);
    Route::post('/courses/yearly-fees', [CourseYearlyFeeController::class, 'store']);
    Route::put('/courses/yearly-fees/{fee}', [CourseYearlyFeeController::class, 'update']);
    Route::delete('/courses/yearly-fees/{fee}', [CourseYearlyFeeController::class, 'destroy']);

    Route::post('/courses/additional-fees', [CourseAdditionalFeeController::class, 'store']);
Route::put('/courses/additional-fees/{fee}', [CourseAdditionalFeeController::class, 'update']);
Route::delete('/courses/additional-fees/{fee}', [CourseAdditionalFeeController::class, 'destroy']);

// routes/api.php
Route::post('/courses/program-structures', [CourseProgramStructureController::class, 'store']);
Route::delete('/courses/program-structures/{id}', [CourseProgramStructureController::class, 'destroy']);
Route::put('/courses/program-structure/{id}', [CourseProgramStructureController::class, 'update']);


});
