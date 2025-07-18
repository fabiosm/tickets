<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Ticket;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('tickets', [TicketController::class, 'index'])->name('dashboard');
    Route::get('tickets/fila/{tipo}', [TicketController::class, 'fila'])->name('tickets.fila');

    Route::get('novo', [TicketController::class, 'novo'])->name('tickets.novo');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
