<?php

namespace Webkul\Marketplace\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

use Webkul\Marketplace\Helpers\MarketplaceHelper;

class MarketplaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MarketplaceHelper::class, function () {
            return new MarketplaceHelper();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/admin.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'marketplace');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'marketplace');

        $this->mergeConfigFrom(
            __DIR__ . '/../Config/admin-menu.php', 'menu.admin'
        );
    }
}
