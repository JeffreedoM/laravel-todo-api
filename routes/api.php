<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::post('/todo', [TodoController::class, 'store']);
    Route::get('/todo', [TodoController::class, 'index']);
});



Route::group([], function () {
    Route::put('/todo/{id}', [TodoController::class, 'update']);
    Route::put('/todo/updateCompleted/{id}', [TodoController::class, 'updateCompleted']);
    Route::get('/todo/{id}', [TodoController::class, 'show']);
    Route::delete('/todo/{id}', [TodoController::class, 'destroy']);
});
