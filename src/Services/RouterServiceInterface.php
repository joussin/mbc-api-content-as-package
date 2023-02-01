<?php

namespace MbcApiContent\Services;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use MbcApiContent\Models\Collections\LaravelRouteCollectionInterface;
use MbcApiContent\Models\Page as PageModel;
use MbcApiContent\Models\PageContent as PageContentModel;
use MbcApiContent\Models\Route as RouteModel;
use Illuminate\Http\Request as LaravelRequest;
use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;

interface RouterServiceInterface
{
    public function initCollections(): void;

    public function getRoutesModelCollection(): EloquentCollection;

    public function getRoutesFrameworkCollection() : RouteCollectionInterface;

    public function getRoutesLaravelCollection() : LaravelRouteCollectionInterface;

    public function getLaravelRoute() : ?LaravelRoute;

    public function getRouteModel(): ?RouteModel;

    public function getPageModel() : ?PageModel;

    public function getPageContentModels() : ?EloquentCollection;

    public function getPageContentModelByName(string $name) : ?PageContentModel;




    public function getStaticRoutesCollection(string $basepath_static_dir = '/static') : array;


}
