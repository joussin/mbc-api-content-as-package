<?php

namespace MbcApiContent\App\Services;


use Illuminate\Http\Request;
use Illuminate\Http\Request as LaravelRequest;
use Illuminate\Routing\Route as LaravelRoute;


use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use MbcApiContent\App\Entity\Route as RouteEntity;
use MbcApiContent\App\Models\Route as RouteModel;

use MbcApiContent\App\Entity\Page as PageEntity;
use MbcApiContent\App\Models\Page as PageModel;



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

    public function getPageModelByRouteModel(RouteModel $routeModel): ?PageModel;


    public function getPageEntityByPageModel(PageModel $pageModel): ?PageEntity;




}
