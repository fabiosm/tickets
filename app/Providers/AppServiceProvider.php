<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Menu do sistema:
        View::composer('*', function ($view) {
            $menu = [
                [
                    'name' => 'Meus tickets',
                    'url' => 'dashboard',
                    'icon' => 'bi-list-task',
                ],
                [
                    'name' => 'Abrir ticket',
                    'url' => 'tickets.novo',
                    'icon' => 'bi-ticket-perforated',
                ]
            ];

            $view->with('menu', $menu);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
