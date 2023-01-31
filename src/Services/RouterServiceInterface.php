<?php

namespace MbcApiContent\Services;


use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;
use MbcApiContent\Entity\Collections\RouteEntityCollectionInterface;
use MbcApiContent\Entity\Route as RouteEntity;
use MbcApiContent\Models\Route as RouteModel;

interface RouterServiceInterface
{

    public function getRoutesEntityCollection(): RouteEntityCollectionInterface;

    public function getRoutesModelCollection(): Collection;

    public function getRoutesLaravelCollection() : RouteCollectionInterface;

    public function initCollections(): RouteEntityCollectionInterface;

    public function createRouteEntityFromRouteModel(RouteModel $routeModel) : RouteEntity;

    public function addRouteToRouter(string $method, string $uri, array $routeAction): LaravelRoute;

}
