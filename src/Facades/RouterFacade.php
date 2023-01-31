<?php

namespace MbcApiContent\Facades;

use Illuminate\Http\Request as LaravelRequest;
use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Facades\Facade;
use MbcApiContent\Models\Collections\RouteModelCollectionInterface;
use MbcApiContent\Models\Route as RouteModel;

/**
 *
 * @method static void initCollections()
 * @method static ?RouteModel getRouteModelByLaravelRoute(LaravelRoute $route)
 *
 * @method static ?LaravelRoute getLaravelRequestRoute(?LaravelRequest $request)
 * @method static RouteModelCollectionInterface getRoutesModelCollection()
 * @method static RouteCollectionInterface getRoutesLaravelCollection()
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
