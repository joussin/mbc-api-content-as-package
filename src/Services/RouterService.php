<?php

namespace MbcApiContent\Services;

use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Facades\Route as RouterFacade;
use MbcApiContent\Models\Collections\RouteModelCollection;
use MbcApiContent\Models\Collections\RouteModelCollectionInterface;
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

    public RouteModelCollectionInterface $routesModelCollection;

    public RouteCollectionInterface $routesLaravelCollection;

    public function __construct()
    {
        $this->routesModelCollection = new RouteModelCollection();
        $this->routesLaravelCollection = $this->getRoutesLaravelCollection();
    }

    public function getRoutesModelCollection(): RouteModelCollectionInterface
    {
        return $this->routesModelCollection;
    }

    public function getRoutesLaravelCollection() : RouteCollectionInterface
    {
        return $this->routesLaravelCollection = \Illuminate\Support\Facades\Route::getRoutes();
    }


    // -----------------creation des routes et du router de laravel-------------------------------------------------------


    public function initCollections(): void
    {
        $this->routesModelCollection = new RouteModelCollection(RouteModel::all()); // collect(RouteModel::all()) // new Collection(),

        $this->routesModelCollection->each(function ($routeModel, $index) {
            $route = $this->addRouteToRouter(
                $routeModel->method,
                $routeModel->uri,
                $routeModel->controller_name,
                $routeModel->controller_action,
            );
        });
    }



    // Route creation dans le Router:
    // la facade Illuminate\Support\Facades\Route est une instance de \Illuminate\Routing\Router
    //      Route::get('get', 'url', 'action')
    //          Route::addRoute('GET', $uri, $action);
    //              $this->routes : \Illuminate\Routing\RouteCollectionInterface
    //              $this->routes->add($this->createRoute($methods, $uri, $action));
    //                  return route

    public function addRouteToRouter(string $method, string $uri, string $controllerName, string $controllerAction): LaravelRoute
    {
        switch ($method) {
            case 'GET':
                return RouterFacade::get($uri, [$controllerName, $controllerAction]);
            case 'POST':
                return RouterFacade::post($uri, [$controllerName, $controllerAction]);
            case 'PUT':
                return RouterFacade::put($uri, [$controllerName, $controllerAction]);
            case 'PATCH':
                return RouterFacade::patch($uri, [$controllerName, $controllerAction]);
            case 'DELETE':
                return RouterFacade::delete($uri, [$controllerName, $controllerAction]);
        }
    }

}
