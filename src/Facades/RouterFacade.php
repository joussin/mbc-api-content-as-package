<?php

namespace MbcApiContent\Facades;


use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 *
 *
 * @method static Collection getRoutesModelCollection()
 * @method static RouteCollectionInterface getRoutesLaravelCollection()
 * @method static void initCollections()
 * @method static LaravelRoute addRouteEntityToRouter(string $method, string $uri, string $controllerName, string $controllerAction)
 *
 * @see \MbcApiContent\Services\RouterService;
 */
class RouterFacade  extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'router_service_facade_accessor';
    }
}
