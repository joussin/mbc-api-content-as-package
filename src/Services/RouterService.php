<?php

namespace MbcApiContent\Services;

use Illuminate\Http\Request;
use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route as RouterFacade;
use MbcApiContent\Entity\Collections\RouteEntityCollectionInterface;
use MbcApiContent\Entity\Route as RouteEntity;
use MbcApiContent\Models\Route as RouteModel;

class RouterService implements RouterServiceInterface
{

/*
 *
 * Les différents objets des routes:
 *
 *  RouteEntity: custom Route Object : \MbcApiContent\Entity\RouteEntity
 *  RouteModel : custom Route DB model : \MbcApiContent\Models\Route
 *  Route/LaravelRoute: laravel route Object : \Illuminate\Routing\Route
 *  Router: laravel router Object : \Illuminate\Routing\Router
 *
 *  \Illuminate\Support\Facades\Route as RouterFacade: laravel router Object facade
 *  \MbcApiContent\Services\RouterService as RouterFacade: custom router service Object facade
 *
 *  Collection RouterService::routesModelCollection : RouteModel[] Collection
 *  Collection RouterService::routesEntityCollection : RouteEntity[] Collection
 *  Collection RouterService::routesLaravelCollection : Route[] RouteCollectionInterface (collection de routes laravel)
 *
 *
 */

    public RouteEntityCollectionInterface $routesEntityCollection;

    public Collection $routesModelCollection;

    public RouteCollectionInterface $routesLaravelCollection;

    public function __construct(RouteEntityCollectionInterface $routeEntityCollection, Collection $routesModelCollection)
    {
        $this->routesEntityCollection = $routeEntityCollection;
        $this->routesModelCollection = $routesModelCollection;
        $this->routesLaravelCollection = $this->getRoutesLaravelCollection();
    }

    public function getRoutesEntityCollection(): RouteEntityCollectionInterface
    {
        return $this->routesEntityCollection;
    }

    public function getRoutesModelCollection(): Collection
    {
        return $this->routesModelCollection;
    }

    public function getRoutesLaravelCollection() : RouteCollectionInterface
    {
       return \Illuminate\Support\Facades\Route::getRoutes();
    }


    // -----------------creation des routes et du router de laravel-------------------------------------------------------


    public function initCollections(): RouteEntityCollectionInterface
    {
        $this->routesModelCollection->each(function ($routeModel, $index) {
            $routeEntity = $this->createRouteEntityFromRouteModel($routeModel);
            $this->routesEntityCollection->add($routeEntity);
        });

        return $this->routesEntityCollection;
    }



    // Route creation dans le Router:
    // la facade Illuminate\Support\Facades\Route est une instance de \Illuminate\Routing\Router
    //      Route::get('get', 'url', 'action')
    //          Route::addRoute('GET', $uri, $action);
    //              $this->routes : \Illuminate\Routing\RouteCollectionInterface
    //              $this->routes->add($this->createRoute($methods, $uri, $action));
    //                  return route

    public function createRouteEntityFromRouteModel(RouteModel $routeModel) : RouteEntity
    {
        $routeEntity = new RouteEntity($routeModel);

        $route = $this->addRouteEntityToRouter($routeEntity);

        $routeEntity->setRoute($route);
        $routeEntity->addRouteOptions();

        $routeEntity->addRouteDefaults('alias', $routeEntity->getName());

        return $routeEntity;
    }


    public function addRouteEntityToRouter(RouteEntity $routeEntity): LaravelRoute
    {

        switch ($routeEntity->getMethod()) {
            case 'GET':
                return RouterFacade::get($routeEntity->getUri(), $routeEntity->getRouteAction());
                break;
            case 'POST':
                return RouterFacade::post($routeEntity->getUri(), $routeEntity->getRouteAction());
                break;
            case 'PUT':
                return RouterFacade::put($routeEntity->getUri(), $routeEntity->getRouteAction());
                break;
            case 'PATCH':
                return RouterFacade::patch($routeEntity->getUri(), $routeEntity->getRouteAction());
                break;
            case 'DELETE':
                return RouterFacade::delete($routeEntity->getUri(), $routeEntity->getRouteAction());
                break;
            default:
                return RouterFacade::get($routeEntity->getUri(), $routeEntity->getRouteAction());
        }
    }

}
