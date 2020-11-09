<?php

namespace App\Providers;

use Roots\Acorn\ServiceProvider;
use Kernl\Lib\Acf;
use Kernl\Lib\Hooks;
use Kernl\Lib\PostTypes;
use Kernl\Lib\Shortcodes;

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
        new Acf();
        new Hooks();
        new PostTypes();
        new Shortcodes();
    }
}
