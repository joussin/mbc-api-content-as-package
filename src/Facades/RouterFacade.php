<?php

namespace MbcApiContent\Facades;


use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Facades\Facade;
use MbcApiContent\Models\Collections\RouteModelCollectionInterface;

/**
 *
 *
 * @method static RouteModelCollectionInterface getRoutesModelCollection()
 * @method static RouteCollectionInterface getRoutesLaravelCollection()
 * @method static void initCollections()
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
