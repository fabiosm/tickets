<?php

use App\Http\Controllers\api\AdminUserController;
use App\Http\Controllers\api\AuthController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:6,1');

Route::middleware('auth:sanctum')->group(function () {
    Route::middleware(IsAdmin::class)->group(function() {
        Route::resource('/admin/users', AdminUserController::class)
            ->only(['index', 'update']);
    });
});
