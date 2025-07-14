<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Ticket;

Route::view('/', 'welcome');

Route::get('tickets', [TicketController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
