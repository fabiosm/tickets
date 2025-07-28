<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class MenuService
{
    private array $menu = [
        [
            'name' => 'Meus tickets',
            'url' => 'dashboard',
            'icon' => 'bi-list-task',
            'is_admin' => false
        ],
        [
            'name' => 'Abrir ticket',
            'url' => 'tickets.novo',
            'icon' => 'bi-ticket-perforated',
            'is_admin' => false
        ],
        [
            'name' => 'Configurações',
            'url' => '',
            'icon' => 'bi bi-gear',
            'is_admin' => true,
            'menu' => [
                [
                    'name' => 'Usuários',
                    'url' => 'users.index'
                ],
                [
                    'name' => 'Filas',
                    'url' => 'filas'
                ],
                [
                    'name' => 'Ticket',
                    'url' => 'dashboard'
                ]
            ]
        ]
    ];

    public function getMenu(): array
    {
        $user = Auth::user();
        if (!$user) {
            return [];
        }

        return $this->process($this->menu);
    }

    private function process(array $menu): array
    {
        $user = Auth::user();

        $currentRoute = Route::currentRouteName();
        foreach ($menu as $key => &$item) {

            if (!empty($item['is_admin']) && empty($user->is_admin)) {
                unset($menu[$key]);
                continue;
            }

            $isExpanded = false;
            $isActive = $currentRoute === $item['url'];
            $item['url'] = $item['url'] && Route::has($item['url'])
                ? route($item['url'])
                : '#';

            if (!empty($item['menu'])) {
                foreach ($item['menu'] as &$sub) {
                    $isActiveSub = false;
                    if ($currentRoute === $sub['url']) {
                        $isActive = true;
                        $isActiveSub = true;
                        $isExpanded = true;
                    }

                    $sub['url'] = Route::has($sub['url']) ? route($sub['url']) : '#';
                    $sub['active'] = $isActiveSub ? 'active' : '';
                }

                $item['submenu'] = true;
            } else {
                $item['submenu'] = false;
            }
            $item['isExpanded'] = $isExpanded ? 'is-expanded' : '';
            $item['active'] = $isActive ? 'active' : '';
        }

        return $menu;
    }
}
