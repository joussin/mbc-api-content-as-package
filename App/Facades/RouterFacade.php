<?php

namespace MainNamespace\App\Facades;


use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
use MainNamespace\App\Entity\Collections\RouteEntityCollectionInterface;
use MainNamespace\App\Entity\Route as RouteEntity;
use MainNamespace\App\Models\Route as RouteModel;

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
 * @see \MainNamespace\App\Services\RouterService;
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
