<?php

namespace MainNamespace\Providers;

use MainNamespace\App\Http\Middleware\RouteMiddleware;
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

        $path = __DIR__.'/../';

        $router = $path  . 'routes/router.php';
        $content = $path  . 'routes/content.php';

        $this->loadRoutesFrom($router);
        $this->loadRoutesFrom($content);
    }
}
