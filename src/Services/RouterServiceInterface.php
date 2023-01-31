<?php

namespace MbcApiContent\Services;


use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;

interface RouterServiceInterface
{

    public function getRoutesModelCollection(): Collection;

    public function getRoutesLaravelCollection() : RouteCollectionInterface;

    public function initCollections(): void;

    public function addRouteToRouter(string $method, string $uri, string $controllerName, string $controllerAction): LaravelRoute;

}
