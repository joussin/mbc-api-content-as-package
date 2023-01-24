<?php

namespace MbcApiContent\App\Services;


use Illuminate\Http\Request;
use Illuminate\Http\Request as LaravelRequest;
use Illuminate\Routing\Route as LaravelRoute;


use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use MbcApiContent\App\Entity\Route as RouteEntity;
use MbcApiContent\App\Entity\Traits\HydrateEntityTrait;
use MbcApiContent\App\Models\Route as RouteModel;

use MbcApiContent\App\Entity\Page as PageEntity;
use MbcApiContent\App\Models\Page as PageModel;

use MbcApiContent\App\Entity\Template as TemplateEntity;
use MbcApiContent\App\Models\Template as TemplateModel;


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


    public function getPageEntityByPageModel(PageModel $pageModel, TemplateEntity $templateEntity): ?PageEntity;


    public function getTemplateModelByPageModel(PageModel $pageModel): ?TemplateModel;


    public function getTemplateEntityByTemplateModel(TemplateModel $templateModel): ?TemplateEntity;


}
