<?php

namespace App\Providers;

use App\View\Components\RegisterWizardComponent;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

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

            // When the request has a webcontentModel add it to the view
            $webcontentModel = Request::get('webcontentModel');
            if ($webcontentModel) {
                $view->with('webcontentModel', $webcontentModel);
            }

            // set the title. fetch the title from the website model
            $websiteTitle = data_get($websiteModel, 'title', data_get($websiteModel, 'publicname', ''));
            $pageTitle = data_get($webcontentModel, 'title', data_get($webcontentModel, 'publicname', ''));

            // concatenate the title and the page title, with a separator if both are present
            $title = $websiteTitle.($pageTitle ? ' - '.$pageTitle : '');
            $view->with('title', $title);
        });

        // Make every nested array a collection, easier to work with
        Collection::macro('recursive', function () {
            return $this->map(function ($value) {
                if (is_array($value) || is_object($value)) {
                    return collect($value)->recursive();
                }

                return $value;
            });
        });

        // register the wizard component
        Livewire::component('register-wizard', RegisterWizardComponent::class);
    }
}
