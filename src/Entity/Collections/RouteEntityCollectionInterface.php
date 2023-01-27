<?php

namespace MbcApiContent\src\Entity\Collections;

use Illuminate\Support\Collection;

interface RouteEntityCollectionInterface
{

    public function getRouteModelsCollection(): Collection;

    public function getLaravelRouteCollection(): LaravelRouteCollectionInterface;
}
