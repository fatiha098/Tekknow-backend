<?php

use App\Http\Controllers\FeedBackController;
use Illuminate\Support\Facades\Route;

Route::post('/submit-form', [FeedBackController::class, 'store']);
