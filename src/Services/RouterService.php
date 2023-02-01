<?php

namespace MbcApiContent\Services;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Facades\Route as RouterFacade;
use MbcApiContent\Models\Page as PageModel;
use MbcApiContent\Models\PageContent as PageContentModel;
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

    public EloquentCollection $routesModelCollection;

    public RouteCollectionInterface $routesLaravelCollection;

    public function __construct()
    {
        $this->routesModelCollection = new EloquentCollection();
        $this->routesLaravelCollection = $this->getRoutesLaravelCollection();
    }

    public function getRoutesModelCollection() : EloquentCollection
    {
        return $this->routesModelCollection;
    }

    public function getRoutesLaravelCollection() : RouteCollectionInterface
    {
        return $this->routesLaravelCollection = \Illuminate\Support\Facades\Route::getRoutes();
    }


    public function getLaravelRoute() : ?LaravelRoute
    {
        return is_null(request()) ? null :  request()->route();
    }


    public function getRouteModel(): ?RouteModel
    {
        $route = $this->getLaravelRoute();
        if(is_null($route))
        {
            return null;
        }
        $routeModels = $this->routesModelCollection->all();

        foreach ($routeModels as $routeModel) {
            if ($routeModel->uri == '/' . $route->uri()) {
                return $routeModel;
            }
        }
        return null;
    }

    public function getPageModel() : ?PageModel
    {
        $route = $this->getRouteModel();
        if(is_null($route))
        {
            return null;
        }
        return $route->page();
    }

    public function getPageContentModels() : ?EloquentCollection
    {
        $page = $this->getPageModel();
        if(is_null($page))
        {
            return null;
        }

        return is_null($page->pageContents()) ? null : $page->pageContents();
    }


    public function getPageContentModelByName(string $name) : ?PageContentModel
    {
        $items = $this->getPageContentModels();
        if(is_null($items) || empty($items))
        {
            return null;
        }

        $items = $items->filter(function($item) use($name) {
            return ($item->name == $name);
        });
        return $items->first();
    }

    // -----------------creation des routes et du router de laravel-------------------------------------------------------


    public function initCollections(): void
    {
        $this->routesModelCollection = new EloquentCollection(RouteModel::all());

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

}
