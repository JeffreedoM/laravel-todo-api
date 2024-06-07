<?php

use App\Http\Controllers\TodoController;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group([], function () {
    Route::post('/todo', [TodoController::class, 'store']);
    Route::put('/todo/{id}', [TodoController::class, 'update']);
    Route::put('/todo/updateCompleted/{id}', [TodoController::class, 'updateCompleted']);
    Route::get('/todo/{id}', [TodoController::class, 'show']);
    Route::get('/todo', [TodoController::class, 'index']);
    Route::delete('/todo/{id}', [TodoController::class, 'destroy']);
});
