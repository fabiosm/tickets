<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('tickets', 'tickets.index')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
