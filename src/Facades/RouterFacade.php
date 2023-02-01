<?php

namespace MbcApiContent\Facades;

use Illuminate\Http\Request as LaravelRequest;
use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Facades\Facade;
use MbcApiContent\Models\Collections\PageContentModelCollectionInterface;
use MbcApiContent\Models\Collections\RouteModelCollectionInterface;
use MbcApiContent\Models\Page as PageModel;
use MbcApiContent\Models\Route as RouteModel;

/**
 *
 * @method static void initCollections()
 *
 * @method static null|PageContentModelCollectionInterface getPageContentModelCollection()
 * @method static null|Illuminate\Database\Eloquent\Collection getPageContentModels()
 * @method static null|PageModel getPageModel()
 * @method static null|RouteModel getRouteModel()
 * @method static null|LaravelRoute getLaravelRoute()
 *
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
