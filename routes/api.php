<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'teste']);

Route::post('/login', [AuthController::class, 'login']);
