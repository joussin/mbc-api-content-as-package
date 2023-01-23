<?php

namespace MainNamespace\App\Services;


use Illuminate\Http\Request;
use Illuminate\Http\Request as LaravelRequest;
use Illuminate\Routing\Route as LaravelRoute;


use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use MainNamespace\App\Entity\Route as RouteEntity;
use MainNamespace\App\Entity\Traits\HydrateEntityTrait;
use MainNamespace\App\Models\Route as RouteModel;

use MainNamespace\App\Entity\Page as PageEntity;
use MainNamespace\App\Models\Page as PageModel;

use MainNamespace\App\Entity\Template as TemplateEntity;
use MainNamespace\App\Models\Template as TemplateModel;


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
