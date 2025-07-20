<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
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
                ],
                [
                    'name' => 'Configurações',
                    'url' => '',
                    'icon' => 'bi bi-gear',
                    'menu' => [
                        [
                            'name' => 'Usuários',
                            'url' => route('users.index')
                        ],
                        [
                            'name' => 'Ticket',
                            'url' => '#'
                        ]
                    ]
                ]
            ];

            foreach ($menu as &$item) {
                $item['active'] = Route::currentRouteName() == $item['url'] ? 'active' : '';

                if (!empty($item['url'])) {
                    $item['url'] = route($item['url']);
                    $item['submenu'] = false;
                } else {
                    $item['url'] = '#';
                    $item['submenu'] = true;
                }
            }

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
