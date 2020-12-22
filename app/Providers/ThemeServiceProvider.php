<?php

namespace App\Providers;

use Roots\Acorn\ServiceProvider;
use Kernl\Lib\Config as KernlConfig;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        new KernlConfig;
    }
}
