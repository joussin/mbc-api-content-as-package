<?php

namespace MbcApiContent\src\Entity\Collections;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

interface LaravelRouteCollectionInterface
{

    /**
     * Get all of the routes in the collection.
     *
     * @return \Illuminate\Routing\Route[]
     */
    public function getRoutes() : array;


    public function getRoutesNameList() : array;

    /**
     * @return \Illuminate\Routing\Route[]
     */
    public function getRoutesByName() : array;

    public function getByName($name) : \Illuminate\Routing\Route|null;



    public function getRoutesUriList() : array;

    public function getRoutesByUriList() : array;

    public function getByUri($uri) : \Illuminate\Routing\Route|null;


    /**
     * Determine if the route collection contains a given named route.
     *
     * @param  string  $name
     * @return bool
     */
    public function hasNamedRoute(string $name) : bool;

    public function hasUriRoute(string $uri) : bool;

    /**
     * Get routes from the collection by method.
     *
     * @param  string|null  $method
     * @return \Illuminate\Routing\Route[]
     */
    public function get_(?string $method = null) : array;


    public function match(Request $request) : ?Route;

    public function generateRouteName() : string;

}
