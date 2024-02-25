<?php

namespace App\Providers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            // Assuming 'websiteModel' is added to the request attributes by the middleware
            $websiteModel = Request::get('websiteModel');
            $view->with('websiteModel', $websiteModel);
        });
    }
}
