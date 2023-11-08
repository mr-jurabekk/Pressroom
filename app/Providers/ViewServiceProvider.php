<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

       View::composer('components.layouts.main', function (\Illuminate\View\View $view) {
            $view->with('current_locale', App::currentLocale());
            $view->with('all_locales', config('app.all-locales'));
        });
    }
}
