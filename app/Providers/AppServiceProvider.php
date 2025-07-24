<?php

namespace App\Providers;

use App\Services\MenuService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(MenuService $menuService): void
    {
        // Menu do sistema:
        View::composer('*', function ($view) use ($menuService) {
            $view->with('menu', $menuService->build());
        });
    }
}
