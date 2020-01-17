<?php

namespace App\Modules\Spa\Providers;

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
        $this->loadTranslationsFrom(module_path('spa', 'Resources/Lang', 'app'), 'spa');
        $this->loadViewsFrom(module_path('spa', 'Resources/Views', 'app'), 'spa');
        $this->loadMigrationsFrom(module_path('spa', 'Database/Migrations', 'app'));
        if(!$this->app->configurationIsCached()) {
            $this->loadConfigsFrom(module_path('spa', 'Config', 'app'));
        }
        $this->loadFactoriesFrom(module_path('spa', 'Database/Factories', 'app'));
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
