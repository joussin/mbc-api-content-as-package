<?php

namespace MbcApiContent\Services;

use MbcApiContent\Models\Route as RouteModel;
use Illuminate\Http\Request as LaravelRequest;
use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use MbcApiContent\Models\Collections\RouteModelCollectionInterface;

interface RouterServiceInterface
{

    public function getRoutesModelCollection(): RouteModelCollectionInterface;

    public function getRoutesLaravelCollection() : RouteCollectionInterface;

    public function getLaravelRequestRoute(?LaravelRequest $request) : ?LaravelRoute;

    public function initCollections(): void;

    public function getRouteModelByLaravelRoute(LaravelRoute $route): ?RouteModel;
}
