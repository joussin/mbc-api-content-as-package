<?php

namespace MbcApiContent\Entity\Collections;

use Illuminate\Support\Collection;

interface RouteEntityCollectionInterface
{

    public function getRouteModelsCollection(): Collection;

    public function getLaravelRouteCollection(): LaravelRouteCollectionInterface;
}
