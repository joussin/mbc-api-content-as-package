<?php

namespace MainNamespace\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use MainNamespace\App\Bootstrap;
use MainNamespace\App\Entity\Collections\LaravelRouteCollection;
use MainNamespace\App\Entity\Collections\LaravelRouteCollectionInterface;
use MainNamespace\App\Entity\Collections\RouteEntityCollection;
use MainNamespace\App\Entity\Collections\RouteEntityCollectionInterface;
use MainNamespace\App\Facades\RouterFacade;
use MainNamespace\App\Models\Page;
use MainNamespace\App\Models\Route as RouteModel;
use MainNamespace\App\Models\Template;
use MainNamespace\App\Services\RenderService;
use MainNamespace\App\Services\RenderServiceInterface;
use MainNamespace\App\Services\RouterService;
use MainNamespace\App\Services\RouterServiceInterface;
use Illuminate\Support\ServiceProvider;


class MainServiceProvider extends ServiceProvider
{

    public string $package_name = 'mbc_api_content';
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // request life
        // kernel -> handle
        //  providers -> register ()
        // ROUTE/WEB.php
        //  providers -> boot()
        // db, validation, queue, components ...
        // routing - RouteServiceProvider
        // routes definitions

        //controller contruct
        // midleware
        // controller action
        //response

        $this->app->singleton(Bootstrap::class);


        $this->mergeConfigFrom(
            file_exists( config_path('mbc-api-content-config.php') ) ? config_path('mbc-api-content-config.php') : (__DIR__ . './../config/mbc-api-content-config.php') ,
            $this->package_name
        );

        $this->loadTranslationsFrom(base_path('laravel-package/resources/lang/'), $this->package_name);
        $this->loadViewsFrom(base_path('laravel-package/resources/views/'), $this->package_name);



        $this->app->register(ConsoleServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);


        // RouterFacade::
        $this->app->singleton('router_service_facade_accessor', function ($app) {
            return app()->make(RouterServiceInterface::class);
        });

        $this->app->singleton(RouterServiceInterface::class, function() {
            return new RouterService(
                app()->make(RouteEntityCollectionInterface::class),
                collect(RouteModel::all())
            );
        });


        $this->app->singleton(RenderServiceInterface::class, function() {
            return new RenderService(
                app()->make(RouterServiceInterface::class)
            );
        });



        $this->app->bind(RouteEntityCollectionInterface::class, function() {
            return new RouteEntityCollection(
                new Collection(),
                app()->make(LaravelRouteCollectionInterface::class)
            );
        });


        $this->app->bind(LaravelRouteCollectionInterface::class, LaravelRouteCollection::class);



    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/mbc-api-content-config.php' => config_path('mbc-api-content-config.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../public/api/' => public_path('api/'),
            ], 'public');
        }

    }




}
