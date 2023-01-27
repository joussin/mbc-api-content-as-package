<?php

namespace MbcApiContent\Providers;

use Illuminate\Support\Facades\Route;
use MbcApiContent\Http\Middleware\RouteMiddleware;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        // advanced.router
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('router.middleware', RouteMiddleware::class);


        $config = config('mbc_api_content_config');

        $apiPrefix = $config['api']['routes']['prefix'] ?? 'api';
        $backofficePrefix = $config['backoffice']['routes']['prefix'] ?? 'backoffice';

        $this->routes(function () use($apiPrefix, $backofficePrefix) {
            Route::middleware('api')
                ->prefix($apiPrefix)
                ->group(__DIR__.'/../../'  . 'routes/api.php');

            Route::middleware('web')
                ->prefix($backofficePrefix)
                ->group(__DIR__.'/../../'  . 'routes/backoffice.php');
        });
    }



}
