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
use MbcApiContent\App\Events\ApiContentEventListenerResolver;
use MbcApiContent\App\Facades\RouterFacade;
use MbcApiContent\App\Models\Page;
use MbcApiContent\App\Models\Route as RouteModel;
use MbcApiContent\App\Models\Template;
use MbcApiContent\App\Services\RenderService;
use MbcApiContent\App\Services\RenderServiceInterface;
use MbcApiContent\App\Services\RouterService;
use MbcApiContent\App\Services\RouterServiceInterface;
use Illuminate\Support\ServiceProvider;
use Spatie\Export\Exporter;


class MainServiceProvider extends ServiceProvider
{

    public const PACKAGE_NAME = 'mbc_api_content';
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



        $this->app->register(ConsoleServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);


        $this->app->singleton(Bootstrap::class, function(){
            return new Bootstrap(
                app()->make(ApiContentEventListenerResolver::class)
            );
        });

        $this->app->singleton(ApiContentEventListenerResolver::class);

        $this->mergeConfigFrom(
            file_exists( config_path('mbc-api-content-config.php') ) ? config_path('mbc-api-content-config.php') : (__DIR__ . './../config/mbc-api-content-config.php') ,
            self::PACKAGE_NAME
        );

        $this->loadViewsFrom(base_path('resources/views/'),
            'views'
        );


        // RouterFacade::
        $this->app->singleton('router_service_facade_accessor', function ($app) {
            return app()->make(RouterServiceInterface::class);
        });
        // RenderFacade::
        $this->app->singleton('render_service_facade_accessor', function ($app) {
            return app()->make(RenderServiceInterface::class);
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

            $this->install();
        }

    }


    public function install()
    {

        try{
            $this->generateSwaggerJsonFromJinja();

            $this->publishes([
                __DIR__.'/../config/mbc-api-content-config.php' => config_path('mbc-api-content-config.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../public/api/' => public_path('api/'),
            ], 'public');

            $this->publishes([
                __DIR__.'/../resources/views/api_content/' => resource_path('views/api_content/'),
            ], 'views');

        }
        catch (\Exception $e)
        {
            throw new \Exception('Error installing ' . $e->getMessage());
        }
    }



    private function generateSwaggerJsonFromJinja()
    {
        $this->generateFromJinja(
            'openapi.json',
            'public/api/docs/',
            [
                'api_prefix' => config(MainServiceProvider::PACKAGE_NAME)['api']['routes']['prefix'],
            ]
        );
    }


    private function generateFromJinja(string $filename, string $filename_path = '', array $datas = [])
    {
        $filename_path = __DIR__ . '/./../' . $filename_path;

        $file_jinja_content = file_get_contents($filename_path.$filename . '.j2');

        $data_parsed = str_replace(
            array_map(function($k){return "{{" . $k . "}}";}, array_keys($datas)), // 'varname' -> '{{varname}}'
            array_values($datas),
            $file_jinja_content
        );

        $myfile = fopen($filename_path . $filename, "w") or die("Unable to open file!");
        fwrite($myfile, $data_parsed);
        fclose($myfile);

        //  unlink($public_path.$file_jinja);
    }
}
