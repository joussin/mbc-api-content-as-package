<?php

namespace MbcApiContent\App\Services;


use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;
use MbcApiContent\App\Entity\Collections\RouteEntityCollectionInterface;
use MbcApiContent\App\Entity\Route as RouteEntity;
use MbcApiContent\App\Models\Route as RouteModel;

interface RouterServiceInterface
{

    public function getRoutesEntityCollection(): RouteEntityCollectionInterface;

    public function getRoutesModelCollection(): Collection;

    public function getRoutesLaravelCollection() : RouteCollectionInterface;

    public function initCollections(): RouteEntityCollectionInterface;

    public function createRouteEntityFromRouteModel(RouteModel $routeModel) : RouteEntity;


    public function addRouteEntityToRouter(RouteEntity $routeEntity): LaravelRoute;

}
