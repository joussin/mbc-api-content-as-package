<?php

namespace MbcApiContent\App\Facades;


use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
use MbcApiContent\App\Entity\Collections\RouteEntityCollectionInterface;
use MbcApiContent\App\Entity\Route as RouteEntity;
use MbcApiContent\App\Models\Route as RouteModel;

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
 * @see \MbcApiContent\App\Services\RouterService;
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
