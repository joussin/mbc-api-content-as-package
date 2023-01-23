<?php

namespace MainNamespace\App\Entity\Collections;


use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;
use MainNamespace\App\Entity\Route as RouteEntity;
use MainNamespace\App\Facades\RouterFacade;

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
