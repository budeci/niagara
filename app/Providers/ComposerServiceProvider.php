<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            '*', 'App\Http\ViewComposers\CommonComposer'
        );
        view()->composer(
            '*', 'App\Http\ViewComposers\LanguageComposer'
        );
        view()->composer('*', function($view){

            return $view->with('meta', (new \App\Meta));
        });
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}