<?php

namespace MbcApiContent\Entity\Collections;


use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;
use MbcApiContent\Entity\Route as RouteEntity;
use MbcApiContent\Facades\RouterFacade;

/**
 * @template TKey of array-key
 * @template EntityInterface
 */
class RouteEntityCollection extends Collection implements RouteEntityCollectionInterface
{

    use RouteEntityCollectionFilterTrait;

    public Collection $routeModelsCollection;

    public LaravelRouteCollectionInterface $laravelRouteCollection;

    /**
     * The items contained in the collection.
     *
     * @var array<TKey, RouteEntity>
     */
    protected $items = [];


    public function __construct(Collection                      $routeModelsCollection,
                                LaravelRouteCollectionInterface $laravelRouteCollection)
    {
        parent::__construct();

        $this->routeModelsCollection = $routeModelsCollection;
        $this->laravelRouteCollection = $laravelRouteCollection;

    }

    /**
     * @return Collection
     */
    public function getRouteModelsCollection(): Collection
    {
        return $this->routeModelsCollection;
    }

    /**
     * @return LaravelRouteCollectionInterface
     */
    public function getLaravelRouteCollection(): LaravelRouteCollectionInterface
    {
        return $this->laravelRouteCollection;
    }


    /**
     * Générate models, laravel route collection
     *
     * @param  RouteEntity  $item
     * @return $this
     */
    public function add($item)
    {
        $this->routeModelsCollection->add($item->getModel());
        $this->laravelRouteCollection->add($item->getRoute());

        $this->items[] = $item;

        return $this;
    }




}
