<?php

namespace MbcApiContent\src\Services;


use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;
use MbcApiContent\src\Entity\Collections\RouteEntityCollectionInterface;
use MbcApiContent\src\Entity\Route as RouteEntity;
use MbcApiContent\src\Models\Route as RouteModel;

interface RouterServiceInterface
{

    public function getRoutesEntityCollection(): RouteEntityCollectionInterface;

    public function getRoutesModelCollection(): Collection;

    public function getRoutesLaravelCollection() : RouteCollectionInterface;

    public function initCollections(): RouteEntityCollectionInterface;

    public function createRouteEntityFromRouteModel(RouteModel $routeModel) : RouteEntity;


    public function addRouteEntityToRouter(RouteEntity $routeEntity): LaravelRoute;

}
