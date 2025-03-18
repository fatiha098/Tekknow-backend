<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/submit-form', [FeedBackController::class, 'store']);


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::apiResource('/messages', MessageController::class);
    Route::apiResource('/users', UserController::class);
    Route::get('/messages/{sender_id}/sent/{receiver_id}', [MessageController::class, 'showMessagesBetweenUsers']);
    Route::apiResource('/contacts', ContactController::class);

    Route::post('/logout', [AuthController::class, 'logout']);
});