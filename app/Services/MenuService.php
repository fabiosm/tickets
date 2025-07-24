<?php

namespace App\Services;

use Illuminate\Support\Facades\Route;

class MenuService
{
    private array $menu = [
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
                    'url' => 'users.index'
                ],
                [
                    'name' => 'Ticket',
                    'url' => 'dashboard'
                ]
            ]
        ]
    ];

    public function build(): array
    {
        return $this->process($this->menu);
    }

    private function process(array $menu): array
    {
        $currentRoute = Route::currentRouteName();
        foreach ($menu as &$item) {
            $isExpanded = false;
            $isActive = $currentRoute === $item['url'];
            $item['url'] = $item['url'] ? route($item['url']) : '#';

            if (!empty($item['menu'])) {
                foreach ($item['menu'] as &$sub) {
                    $isActiveSub = false;
                    if ($currentRoute === $sub['url']) {
                        $isActive = true;
                        $isActiveSub = true;
                        $isExpanded = true;
                    }

                    $sub['url'] = route($sub['url']);
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
