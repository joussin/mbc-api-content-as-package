<?php

namespace MbcApiContent\src\Facades;


use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
use MbcApiContent\src\Entity\Collections\RouteEntityCollectionInterface;
use MbcApiContent\src\Entity\Route as RouteEntity;
use MbcApiContent\src\Models\Route as RouteModel;

/**
 *
 *
 * @method static RouteEntityCollectionInterface getRoutesEntityCollection()
 * @method static Collection getRoutesModelCollection()
 * @method static RouteCollectionInterface getRoutesLaravelCollection()
 * @method static RouteEntityCollectionInterface initCollections()
 * @method static RouteEntity createRouteEntityFromRouteModel(RouteModel $routeModel)
 * @method static LaravelRoute addRouteEntityToRouter(RouteEntity $routeEntity)
 *
 * @see \MbcApiContent\src\Services\RouterService;
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
