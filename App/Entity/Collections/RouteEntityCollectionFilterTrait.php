<?php

namespace MainNamespace\App\Entity\Collections;


use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;
use MainNamespace\App\Entity\Route as RouteEntity;


Trait RouteEntityCollectionFilterTrait
{

    public function intersectRoutesCollectionToRoutesArray(RouteCollectionInterface $routesFramework,Collection  $routesApp, bool $union = true) : array
    {
        $routesFramework =  (array_values($routesFramework->getRoutes()));
        $routesApp =  (array_values($routesApp->getRoutes()));

        $intersection = [];
        $exclusion = [];

        foreach ($routesFramework as $routeFramework)
        {
            if(  !is_null($routeFramework->getName()) )
            {
                $routeFrameworkName = $routeFramework->getName();

                foreach ($routesApp as $routeApp)
                {
                    $routeAppName = ($routeApp->getName()) ?? '';

                     $is = ($routeAppName == $routeFrameworkName);

                     if($is && $union)$intersection[] = $routeFramework;
                     if(!$is && !$union)$exclusion[] = $routeFramework;
                }
            }
        }
        if($union)
            return $intersection;
        if(!$union)
            return $exclusion;
    }


    public function intersectRoutesCollectionToRouteNamesArray(\Illuminate\Routing\RouteCollectionInterface $routerRoutes)
    {
        $routesName = array_keys($routerRoutes->getRoutesByName());
        $routesNameCustom =  array_keys($this->laravelRouteCollection->getRoutesByName());

        $intersection = array_intersect($routesName, $routesNameCustom);

        return $intersection;
    }


    public function routesCollectionToRouteNamesArrayExclusion(\Illuminate\Routing\RouteCollectionInterface $routerRoutes)
    {
        $routesName = array_keys($routerRoutes->getRoutesByName());
        $routesNameCustom =  array_keys($this->laravelRouteCollection->getRoutesByName());

        $udif = array_udiff($routesName, $routesNameCustom, function($a, $b) {
            return ($a == $b) ? 0 : 10;
        });

        return $udif;
    }




    public function filterRoutesCollectionByDefaults(string $defaultKey, $defaultValue = null, ?array $collectionItemsAsArrayToFilter = null, bool $outputAsArray = false): array|Collection
    {
        $routesCollection = (is_null($collectionItemsAsArrayToFilter)) ? collect($this->all()) : $this->collect($collectionItemsAsArrayToFilter);

        $routesCollection = $routesCollection->filter(function($route) use($defaultKey, $defaultValue) {

            if (isset($route->getDefaults()[$defaultKey]) ) {

                if(!is_null($defaultValue) && $route->getDefaults()[$defaultKey] != $defaultValue)
                {
                        return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        });
        return ($outputAsArray) ? $routesCollection->all() : $routesCollection;
    }


    public function filterRoutesCollectionByNameExpression(array $patterns, ?array $collectionItemsAsArrayToFilter = null, bool $outputAsArray = false): array|Collection
    {
        $routesCollection = (is_null($collectionItemsAsArrayToFilter)) ? collect($this->all()) : $this->collect($collectionItemsAsArrayToFilter);

        $routesCollection = $routesCollection->filter(function($route) use($patterns) {

            return (!$route->named($patterns));
        });

        return ($outputAsArray) ? $routesCollection->all() : $routesCollection;
    }


    public function filterRoutesCollectionWithCallback(\Closure $callback, ?array $collectionItemsAsArrayToFilter = null, bool $outputAsArray = false): array|Collection
    {
        $routesCollection = (is_null($collectionItemsAsArrayToFilter)) ? collect($this->all()) : $this->collect($collectionItemsAsArrayToFilter);

        $routesCollection = $routesCollection->filter(function($route) use ($callback) {

            return $callback($route);
        });

        return ($outputAsArray) ? $routesCollection->all() : $routesCollection;
    }




    // filter as Array


//    public function filterRoutesByDefaults(string $defaultKey, $defaultValue = null, ?array $collectionItemsAsArrayToFilter = null): array
//    {
//
//        $routes = (is_null($collectionItemsAsArrayToFilter)) ?  $this->all() : $collectionItemsAsArrayToFilter;
//
//        $routesClone = $routes;
//
//        foreach ($routesClone as $k => $route) {
//
//            if (isset($route->getDefaults()[$defaultKey])) {
//
//                if (!is_null($defaultValue) && $route->getDefaults()[$defaultKey] != $defaultValue) {
//                    unset($routesClone[$k]);
//                }
//            } else {
//                unset($routesClone[$k]);
//            }
//        }
//
//        return $routesClone;
//    }
//
//    public function filterRoutesByNameExpression(array $patterns, ?array $collectionItemsAsArrayToFilter = null): array
//    {
//        $routes = (is_null($collectionItemsAsArrayToFilter)) ?  $this->all() : $collectionItemsAsArrayToFilter;
//        $routesClone = $routes;
//
//        foreach ($routesClone as $k => $route) {
//            if (!$route->named($patterns)) {
//                unset($routesClone[$k]);
//            }
//        }
//        return $routesClone;
//    }
//
//    /**
//     * method filter route if callback dont return true
//     *
//     * @param \Closure $callback
//     * @return array
//     */
//    public function filterRoutesWithCallback(\Closure $callback, ?array $collectionItemsAsArrayToFilter = null): array
//    {
//        $routes = (is_null($collectionItemsAsArrayToFilter)) ?  $this->all() : $collectionItemsAsArrayToFilter;
//        $routesClone = $routes;
//
//        foreach ($routesClone as $k => $route) {
//            $callbackReturn = $callback($route);
//            if (!$callbackReturn) {
//                unset($routesClone[$k]);
//            }
//        }
//        return $routesClone;
//    }
//


}
