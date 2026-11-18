<?php

namespace App\Providers;

use App\Models\MenuItem;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['partials.header', 'partials.footer'], function (\Illuminate\View\View $view): void {
            $menuItems = Schema::hasTable('menu_items')
                ? MenuItem::query()->active()->get()
                : collect();

            $view->with('menuItems', $menuItems);
        });
    }
}
