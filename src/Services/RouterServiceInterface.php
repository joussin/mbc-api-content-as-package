<?php

namespace MbcApiContent\Services;

use Illuminate\Database\Eloquent\Collection;
use MbcApiContent\Models\Page as PageModel;
use MbcApiContent\Models\PageContent as PageContentModel;
use MbcApiContent\Models\Route as RouteModel;
use Illuminate\Http\Request as LaravelRequest;
use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use MbcApiContent\Models\Collections\RouteModelCollectionInterface;

interface RouterServiceInterface
{

    public function getRoutesModelCollection(): RouteModelCollectionInterface;

    public function getRoutesLaravelCollection() : RouteCollectionInterface;

    public function getLaravelRoute() : ?LaravelRoute;

    public function getRouteModel(): ?RouteModel;

    public function getPageModel() : ?PageModel;

    public function getPageContentModels() : ?Collection;

    public function getPageContentModelByName(string $name) : ?PageContentModel;

    public function initCollections(): void;
}
