<?php

namespace App\Modules\Route\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('route', 'Resources/Lang', 'app'), 'route');
        $this->loadViewsFrom(module_path('route', 'Resources/Views', 'app'), 'route');
        $this->loadMigrationsFrom(module_path('route', 'Database/Migrations', 'app'));
        if(!$this->app->configurationIsCached()) {
            $this->loadConfigsFrom(module_path('route', 'Config', 'app'));
        }
        $this->loadFactoriesFrom(module_path('route', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
