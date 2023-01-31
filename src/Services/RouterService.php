<?php

namespace MbcApiContent\Services;

use Illuminate\Http\Request as LaravelRequest;
use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Facades\Route as RouterFacade;
use MbcApiContent\Models\Collections\RouteModelCollection;
use MbcApiContent\Models\Collections\RouteModelCollectionInterface;
use MbcApiContent\Models\Page;
use MbcApiContent\Models\Route as RouteModel;

class RouterService implements RouterServiceInterface
{
    /**
     *
     *         // request life
    // kernel -> handle
    //  providers -> register ()
    // ROUTE/WEB.php
    //  providers -> boot()
    // db, validation, queue, components ...
    // routing - RouteServiceProvider
    // routes definitions
    //controller contruct
    // midleware
    // controller action
    //response
     */
    /**
     *
     * Les différents objets des routes:
     *
     *  RouteEntity: custom Route Object : \MbcApiContent\Entity\RouteEntity
     *  RouteModel : custom Route DB model : \MbcApiContent\Models\Route
     *  Route/LaravelRoute: laravel route Object : \Illuminate\Routing\Route
     *  Router: laravel router Object : \Illuminate\Routing\Router
     *
     *  \Illuminate\Support\Facades\Route as RouterFacade: laravel router Object facade
     *  \MbcApiContent\Services\RouterService as RouteFacade: custom router service Object facade
     *
     *  Collection RouterService::routesModelCollection : RouteModel[] Collection
     *  Collection RouterService::routesEntityCollection : RouteEntity[] Collection
     *  Collection RouterService::routesLaravelCollection : Route[] RouteCollectionInterface (collection de routes laravel)
     *
     *
     *
     *
     *     // Route creation dans le Router:
    // la facade Illuminate\Support\Facades\Route est une instance de \Illuminate\Routing\Router
    //      Route::get('get', 'url', 'action')
    //          Route::addRoute('GET', $uri, $action);
    //              $this->routes : \Illuminate\Routing\RouteCollectionInterface
    //              $this->routes->add($this->createRoute($methods, $uri, $action));
    //                  return route

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


    public function getLaravelRequestRoute() : ?LaravelRoute
    {
        return is_null(request()) ? null :  request()->route();
    }



    // -----------------creation des routes et du router de laravel-------------------------------------------------------


    public function initCollections(): void
    {
        $this->routesModelCollection = new RouteModelCollection(RouteModel::all());

        $this->routesModelCollection->each(function ($routeModel, $index) {
            $route = $this->addRouteToRouter(
                $routeModel->method,
                $routeModel->uri,
                $routeModel->controller_name,
                $routeModel->controller_action,
            );
        });
    }




    private function addRouteToRouter(string $method, string $uri, string $controllerName, string $controllerAction): LaravelRoute
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

    public function getRouteModelByLaravelRoute(LaravelRoute $route): ?RouteModel
    {
        $routeModels = $this->routesModelCollection->all();

        foreach ($routeModels as $routeModel) {
            if ($routeModel->toArray()['uri'] == '/' . $route->uri()) {
                return $routeModel;
            }
        }
        return null;
    }
}
