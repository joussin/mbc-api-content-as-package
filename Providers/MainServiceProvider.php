<?php

namespace MbcApiContent\Providers;

use Illuminate\Support\Collection;
use MbcApiContent\App\Bootstrap;
use MbcApiContent\App\Entity\Collections\LaravelRouteCollection;
use MbcApiContent\App\Entity\Collections\LaravelRouteCollectionInterface;
use MbcApiContent\App\Entity\Collections\RouteEntityCollection;
use MbcApiContent\App\Entity\Collections\RouteEntityCollectionInterface;
use MbcApiContent\App\Events\ApiContentEventListenerResolver;
use MbcApiContent\App\Models\Route as RouteModel;
use MbcApiContent\App\Services\RenderService;
use MbcApiContent\App\Services\RenderServiceInterface;
use MbcApiContent\App\Services\RouterService;
use MbcApiContent\App\Services\RouterServiceInterface;
use Illuminate\Support\ServiceProvider;


class MainServiceProvider extends ServiceProvider
{

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

        $this->mergeConfigFrom(
            file_exists( config_path('mbc-api-content-config.php') ) ? config_path('mbc-api-content-config.php') : (__DIR__ . './../config/mbc-api-content-config.php') ,
            'mbc_api_content_config'
        );

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

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'api_content_views'); // return view('api_content_views::dashboard');

    }


    public function install()
    {

        try{
          //  $this->generateSwaggerJsonFromJinja();

            $this->publishes([
                __DIR__.'/../config/mbc-api-content-config.php' => config_path('mbc-api-content-config.php'),
            ]);

            $this->publishes([
                __DIR__.'/../public/api/' => public_path('api/'),
            ]);


            $this->publishes([
                __DIR__.'/../resources/views/' => resource_path('views/vendor/mbc-api-content/'),
            ]);

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
                'api_prefix' => config('mbc_api_content_config')['api']['routes']['prefix'],
            ],
            true
        );
    }


    private function generateFromJinja(string $filename, string $filename_path = '', array $datas = [], bool $deleteAfter = false)
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

//        if($deleteAfter)
//        unlink($filename_path.$filename . '.j2');
    }
}
