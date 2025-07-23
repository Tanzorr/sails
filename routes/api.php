<?php

use App\Http\Controllers\Api\RandomNumberController;
use Illuminate\Support\Facades\Route;

Route::get('generate', [RandomNumberController::class, 'generate'])
    ->name('api.random_number.generate');

Route::get('retrieve/{id}', [RandomNumberController::class, 'retrieve'])
    ->name('api.random_number.retrieve');
