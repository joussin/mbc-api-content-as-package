<?php

namespace MbcApiContent\Services;


use Illuminate\Http\Request;
use Illuminate\Http\Request as LaravelRequest;
use Illuminate\Routing\Route as LaravelRoute;


use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use MbcApiContent\Entity\Route as RouteEntity;
use MbcApiContent\Models\Route as RouteModel;

use MbcApiContent\Entity\Page as PageEntity;
use MbcApiContent\Models\Page as PageModel;



interface RenderServiceInterface
{

    /**
     * @param LaravelRequest $request
     * @return void
     * @throws \Exception
     */
    public function requestToRender(Request $request) : void;

    public function getHtml() :?string;


    public function requestToContentCollection(LaravelRequest $request): bool;


    public function getRouteEntityByLaravelRoute(LaravelRoute $route, string $filter = 'name'): ?RouteEntity;

    public function getPageModel(RouteModel $routeModel, LaravelRoute $laravelRoute): ?PageModel;


    public function getPageEntityByPageModel(PageModel $pageModel): ?PageEntity;




}
