<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Diglactic\Breadcrumbs\Breadcrumbs;

class BreadcrumbsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Breadcrumbs::for('dashboard', function ($trail) {
            $trail->push(
                'Meus tickets',
                route('dashboard'),
                [
                    'icon' => 'bi bi-list-task',
                    'text' => '',
                ]
            );
        });

        Breadcrumbs::for('tickets.fila', function ($trail, $tipo) {
            $trail->parent('dashboard');
            $trail->push(
                'Tickets ' . ucfirst($tipo),
                route('tickets.fila', ['tipo' => $tipo]),
                [
                    'icon' => 'bi bi-list-task',
                    'text' => '',
                ]
            );
        });

        Breadcrumbs::for('tickets.novo', function ($trail) {
            $trail->push(
                'Abrir Tickets',
                route('tickets.novo'),
                [
                    'icon' => 'bi bi-list-task',
                    'text' => '',
                ]
            );
        });

        Breadcrumbs::for('profile', function ($trail) {
            $trail->push(
                'Profile',
                route('profile'),
                [
                    'icon' => 'bi bi-ticket-perforated',
                    'text' => '',
                ]
            );
       });
    }
}
