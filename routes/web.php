<?php

use App\Http\Controllers\admin\FilasController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\TicketController;

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified', 'checkUserStatus'])->group(function () {
    Route::get('tickets', [TicketController::class, 'index'])->name('dashboard');
    Route::get('tickets/fila/{tipo}', [TicketController::class, 'fila'])->name('tickets.fila');
    Route::get('novo', [TicketController::class, 'novo'])->name('tickets.novo');

    // Rotas apenas para administradores:
    Route::middleware(IsAdmin::class)->group(function() {
        Route::get('users', [UserController::class, 'index'])->name('users');
        Route::get('admin/filas', [FilasController::class, 'index'])->name('admin.filas');
    });
});

Route::middleware('auth')->group(function() {
    Route::view('profile', 'profile')
        ->name('profile');

    Route::get('/logout', function() {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();
        return redirect('/');
    })->name('logout');
});

require __DIR__.'/auth.php';
