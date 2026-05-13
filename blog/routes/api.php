<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\PostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Post API's
Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);

// Register,Login API's
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// Profile API as protected
Route::middleware('auth:sanctum')->get('/profile', function (Request $request) {
    return $request->user();
});
