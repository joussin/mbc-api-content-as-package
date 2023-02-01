<?php

namespace MbcApiContent\Services;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Facades\Route as LaravelRouterFacade;
use MbcApiContent\Facades\RouterFacade;
use MbcApiContent\Models\Collections\LaravelRouteCollection;
use MbcApiContent\Models\Collections\LaravelRouteCollectionInterface;
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
     *  \MbcApiContent\Services\RouterService as RouterFacade: custom router service Object facade
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

    public RouteCollectionInterface $routesFrameworkCollection;

    public  LaravelRouteCollectionInterface $routesLaravelCollection;

    public function __construct()
    {
        $this->routesModelCollection = new EloquentCollection();
        $this->routesLaravelCollection = new LaravelRouteCollection();
        $this->routesFrameworkCollection = $this->getRoutesFrameworkCollection();
    }

    public function getRoutesModelCollection() : EloquentCollection
    {
        return $this->routesModelCollection;
    }

    public function getRoutesFrameworkCollection() : RouteCollectionInterface
    {
        return $this->routesFrameworkCollection = \Illuminate\Support\Facades\Route::getRoutes();
    }


    public function getRoutesLaravelCollection() : LaravelRouteCollectionInterface
    {
        return $this->routesLaravelCollection;
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
        return $route->page()->getResults();
    }

    public function getPageContentModels() : ?EloquentCollection
    {
        $page = $this->getPageModel();
        if(is_null($page))
        {
            return null;
        }

        return is_null($page->pageContents()->getResults()) ? null : $page->pageContents()->getResults();
    }

    // pour recupérer un PageContent par son nom
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

    public function getRoutesDatasForExporter() : array
    {
        return $this->routesLaravelCollection->getDefaults();
    }



    // -----------------creation des routes et du router de laravel-------------------------------------------------------


    public function initCollections(): void
    {
        $this->routesModelCollection = new EloquentCollection(RouteModel::all());

        $this->routesModelCollection->each(function ($routeModel) {
            $route = $this->addRouteToRouter(
                strtoupper($routeModel->method),
                $routeModel->uri,
                $routeModel->controller_name ?? RouteModel::DEFAULT_CONTROLLER_NAME,
                $routeModel->controller_action ?? RouteModel::DEFAULT_CONTROLLER_ACTION
            );

            $route->name($routeModel->name);
            $route->setDefaults([
                'export' => [
                    'id'              => $routeModel->id,
                    'uri'             => $routeModel->uri,
                    'static_uri'      => $routeModel->static_uri,
                    'static_doc_name' => $routeModel->static_doc_name,
                ],
                'extractPathParameters' => $routeModel->extractPathParameters()
            ]);
            $this->routesLaravelCollection->add($route);
        });
    }

    private function addRouteToRouter(string $method, string $uri, string $controllerName, string $controllerAction): LaravelRoute
    {
        switch ($method) {
            case 'GET':
                return LaravelRouterFacade::get($uri, [$controllerName, $controllerAction]);
            case 'POST':
                return LaravelRouterFacade::post($uri, [$controllerName, $controllerAction]);
            case 'PUT':
                return LaravelRouterFacade::put($uri, [$controllerName, $controllerAction]);
            case 'PATCH':
                return LaravelRouterFacade::patch($uri, [$controllerName, $controllerAction]);
            case 'DELETE':
                return LaravelRouterFacade::delete($uri, [$controllerName, $controllerAction]);
        }
    }
}
