<?php

namespace MbcApiContent\Facades;

use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Facades\Facade;
use MbcApiContent\Models\Page as PageModel;
use MbcApiContent\Models\PageContent as PageContentModel;
use MbcApiContent\Models\Route as RouteModel;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

/**
 *
 * @method static void initCollections()
 *
 * @method static null|PageContentModel getPageContentModelByName(string $name)
 * @method static null|EloquentCollection getPageContentModels()
 * @method static null|PageModel getPageModel()
 * @method static null|RouteModel getRouteModel()
 * @method static null|LaravelRoute getLaravelRoute()
 *
 * @method static EloquentCollection getRoutesModelCollection()
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
