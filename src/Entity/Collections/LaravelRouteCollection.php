<?php

namespace MbcApiContent\src\Entity\Collections;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use MbcApiContent\src\Facades\RouterFacade;


/**
 * @template TKey of array-key
 * @template TValue
 *
 */
class LaravelRouteCollection extends Collection implements LaravelRouteCollectionInterface
{

    protected $uriList = [];
    protected $itemsByUri = [];

    protected $nameList = [];

    protected $itemsByName = [];

    /**
     * The items contained in the collection.
     *
     * @var array<TKey, Route>
     */
    protected $items = [];

    /**
     * Create a new collection.
     *
     * @param  \Illuminate\Contracts\Support\Arrayable<TKey, Route>|iterable<TKey, Route>|null  $items
     * @return void
     */
    public function __construct($items = [])
    {
        parent::__construct($items);
    }

    /**
     * Add an item to the collection.
     *
     * @param  Route  $item
     * @return $this
     */
    public function add(mixed $item)
    {
        $this->uriList[] = $item->uri();
        $this->itemsByUri[$item->uri()] = $item;

        $this->nameList[] = $item->getName();
        $this->itemsByName[$item->getName()] = $item;

        return parent::add($item);
    }

    /**
     * Get all of the routes in the collection.
     *
     * @return \Illuminate\Routing\Route[]
     */
    public function getRoutes() : array
    {
        return array_values($this->items);
    }


    public function getRoutesNameList() : array
    {
        return $this->nameList;
    }

    /**
     * @return \Illuminate\Routing\Route[]
     */
    public function getRoutesByName() : array
    {
        return $this->itemsByName;
    }

    /**
     * Get a route instance by its name.
     *
     * @param  string  $name
     * @return \Illuminate\Routing\Route|null
     */
    public function getByName($name) : \Illuminate\Routing\Route|null
    {
        return $this->nameList[$name] ?? null;
    }


    public function getRoutesUriList() : array
    {
        return $this->uriList;
    }

    /**
     * @return \Illuminate\Routing\Route[]
     */
    public function getRoutesByUriList() : array
    {
        return $this->itemsByUri;
    }

    /**
     * Get a route instance by its uri.
     *
     * @param  string  $uri
     * @return \Illuminate\Routing\Route|null
     */
    public function getByUri($uri) : \Illuminate\Routing\Route|null
    {
        return $this->itemsByUri[$uri] ?? null;
    }





    /**
     * Determine if the route collection contains a given named route.
     *
     * @param  string  $name
     * @return bool
     */
    public function hasNamedRoute(string $name) : bool
    {
        return ! is_null($this->getByName($name));
    }

    /**
     * Determine if the route collection contains a given uri route.
     *
     * @param  string  $uri
     * @return bool
     */
    public function hasUriRoute(string $uri) : bool
    {
        return ! is_null($this->getByUri($uri));
    }

    /**
     * Get routes from the collection by method.
     *
     * @param  string|null  $method
     * @return \Illuminate\Routing\Route[]
     */
    public function get_(?string $method = null) : array
    {
        return is_null($method) ? $this->getRoutes() : Arr::get($this->routes, $method, []);
    }


    /**
     * Find the first route matching a given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Route|null
     *
     * @throws \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function match(Request $request) : ?Route
    {
//        $routes = $this->get_($request->getMethod());

        $request = $request->setRouteResolver(function() use ($request)
        {
            return RouterFacade::getRoutesLaravelCollection()->match($request);
        });

        return $request->route();

    }


    /**
     * Get a randomly generated route name.
     *
     * @return string
     */
    public function generateRouteName() : string
    {
        return 'generated::'.Str::random();
    }


}
