<?php

namespace MbcApiContent\Providers;

use MbcApiContent\Bootstrap;
use MbcApiContent\Events\ApiContentEventListener;
use MbcApiContent\Events\ApiContentMigrationsEventListener;
use MbcApiContent\Events\ApiContentModelsEventListener;
use MbcApiContent\Models\Services\MigrationService;
use MbcApiContent\Services\RenderingService;
use MbcApiContent\Services\RenderingServiceInterface;
use MbcApiContent\Services\RouterService;
use MbcApiContent\Services\RouterServiceInterface;
use Illuminate\Support\ServiceProvider;


class MainServiceProvider extends ServiceProvider
{

    /**
     *
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(ConsoleServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);


        $this->app->singleton(Bootstrap::class, function($app){
            return new Bootstrap(
                $app->make(ApiContentEventListener::class),
                $app->make(ApiContentModelsEventListener::class),
                $app->make(ApiContentMigrationsEventListener::class),
            );
        });

        $this->app->singleton(ApiContentEventListener::class);
        $this->app->singleton(ApiContentModelsEventListener::class);

        $this->app->singleton(ApiContentMigrationsEventListener::class, function($app) {
            return new ApiContentMigrationsEventListener(
                $app->make(MigrationService::class),
            );
        });

        $this->app->singleton(MigrationService::class);


        // RouterFacade::
        $this->app->singleton('router_service_facade_accessor', function ($app) {
            return $app->make(RouterServiceInterface::class);
        });

        $this->app->singleton(RouterServiceInterface::class, RouterService::class);

//        // RenderFacade::
//        $this->app->singleton('render_service_facade_accessor', function ($app) {
//            return app()->make(RenderServiceInterface::class);
//        });

//        $this->app->singleton(RenderServiceInterface::class, function() {
//            return new RenderService(
//                app()->make(RouterServiceInterface::class)
//            );
//        });


        $this->mergeConfigFrom(
            file_exists( config_path('mbc-api-content-config.php') ) ? config_path('mbc-api-content-config.php') : (__DIR__ . './../../config/mbc-api-content-config.php') ,
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
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'api_content_views'); // return view('api_content_views::dashboard');

        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        if ($this->app->runningInConsole()) {

            try{

                $this->publishes([
                    __DIR__.'/../../config/mbc-api-content-config.php' => config_path('mbc-api-content-config.php'),
                ]);

                $this->publishes([
                    __DIR__.'/../../public/api/' => public_path('api/'),
                ]);


                $this->publishes([
                    __DIR__.'/../../resources/views/' => resource_path('views/vendor/api_content_views/'),
                ]);

            }
            catch (\Exception $e)
            {
                throw new \Exception('Error installing ' . $e->getMessage());
            }
        }
    }
}
