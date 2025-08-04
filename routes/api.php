<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CountryController;
use App\Http\Controllers\API\LevelController;
use App\Http\Controllers\API\UniversityController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::get('/countries', [CountryController::class, 'index']);

Route::get('/universities', [UniversityController::class, 'index']);

Route::get('/levels', [LevelController::class, 'index']);

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

});
