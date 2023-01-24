<?php

namespace MbcApiContent\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use MbcApiContent\App\Bootstrap;
use MbcApiContent\App\Entity\Collections\LaravelRouteCollection;
use MbcApiContent\App\Entity\Collections\LaravelRouteCollectionInterface;
use MbcApiContent\App\Entity\Collections\RouteEntityCollection;
use MbcApiContent\App\Entity\Collections\RouteEntityCollectionInterface;
use MbcApiContent\App\Facades\RouterFacade;
use MbcApiContent\App\Models\Page;
use MbcApiContent\App\Models\Route as RouteModel;
use MbcApiContent\App\Models\Template;
use MbcApiContent\App\Services\RenderService;
use MbcApiContent\App\Services\RenderServiceInterface;
use MbcApiContent\App\Services\RouterService;
use MbcApiContent\App\Services\RouterServiceInterface;
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


            $this->generateFromJinja();
        }

    }

    private function generateFromJinja()
    {

        $api_prefix = config('mbc_api_content')['api']['routes']['prefix'];

        $public_path = __DIR__ . '/./../public/api/docs/';

        $file = 'openapi.json';

        $file_jinja = 'openapi.json.j2';


        $data = file_get_contents($public_path.$file_jinja);

        $vars = [
            '{{api_prefix}}' => $api_prefix,
        ];

        $data_parsed = str_replace(
            array_keys($vars),
            array_values($vars),
            $data
        );

        $myfile = fopen($public_path . $file, "w") or die("Unable to open file!");
        fwrite($myfile, $data_parsed);
        fclose($myfile);

        unlink($public_path.$file_jinja);
    }

}
