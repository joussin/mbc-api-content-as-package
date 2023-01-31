<?php

namespace MbcApiContent\Services;


use Illuminate\Routing\RouteCollectionInterface;
use MbcApiContent\Models\Collections\RouteModelCollectionInterface;

interface RouterServiceInterface
{

    public function getRoutesModelCollection(): RouteModelCollectionInterface;

    public function getRoutesLaravelCollection() : RouteCollectionInterface;

    public function initCollections(): void;

}
