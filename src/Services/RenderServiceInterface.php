<?php

namespace MbcApiContent\Services;

use Illuminate\Http\Request as LaravelRequest;
use Illuminate\Routing\Route as LaravelRoute;
use MbcApiContent\Entity\Route as RouteEntity;

interface RenderServiceInterface
{

    /**
     * @param LaravelRequest $request
     * @return void
     * @throws \Exception
     */
    public function requestToRender(LaravelRequest $request) : void;

    public function requestToContentCollection(LaravelRequest $request): bool;

    public function getRouteEntityByLaravelRoute(LaravelRoute $route): ?RouteEntity;

}
