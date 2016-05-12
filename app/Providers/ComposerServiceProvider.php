<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        # Make the variable "user" available to all views
        \View::composer('*', function($view) {
            $view->with([
                'user' => \Auth::user(),
                'tags' => \App\Tag::all(),
                'recruiters' => \App\Recruiter::all(),
                'locations' => \App\Location::all()
            ]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
