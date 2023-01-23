<?php

namespace MainNamespace\App\Services;


use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;
use MainNamespace\App\Entity\Collections\RouteEntityCollectionInterface;
use MainNamespace\App\Entity\Route as RouteEntity;
use MainNamespace\App\Models\Route as RouteModel;

interface RouterServiceInterface
{

    public function getRoutesEntityCollection(): RouteEntityCollectionInterface;

    public function getRoutesModelCollection(): Collection;

    public function getRoutesLaravelCollection() : RouteCollectionInterface;

    public function initCollections(): RouteEntityCollectionInterface;

    public function createRouteEntityFromRouteModel(RouteModel $routeModel) : RouteEntity;


    public function addRouteEntityToRouter(RouteEntity $routeEntity): LaravelRoute;

}
