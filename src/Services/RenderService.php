<?php

namespace MbcApiContent\Services;


use Illuminate\Http\Request;
use Illuminate\Http\Request as LaravelRequest;
use Illuminate\Routing\Route as LaravelRoute;


use MbcApiContent\Entity\Collections\RouteEntityCollectionInterface;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use MbcApiContent\Entity\Route as RouteEntity;
use MbcApiContent\Entity\Traits\HydrateEntityTrait;
use MbcApiContent\Facades\RouterFacade;
use MbcApiContent\Models\Route as RouteModel;

use MbcApiContent\Entity\Page as PageEntity;
use MbcApiContent\Models\Page as PageModel;

class RenderService implements RenderServiceInterface
{


    // ---------------------INPUT----------------------------------
    public RouteEntityCollectionInterface $routesEntityCollection;

    public Collection $routesModelCollection;

    public RouteCollectionInterface $routesLaravelCollection;

    public LaravelRequest $laravelRequest;


    // -----------------------OUTPUT--------------------------------

    public ?LaravelRoute $laravelRoute;

    public ?RouteEntity $routeEntity;
    public ?RouteModel $routeModel;

    public ?PageEntity $pageEntity;
    public ?PageModel $pageModel;

    public function __construct(RouterServiceInterface $routerService)
    {
        $this->routesEntityCollection = $routerService->getRoutesEntityCollection();
        $this->routesModelCollection = $routerService->getRoutesModelCollection();
        $this->routesLaravelCollection = $routerService->getRoutesLaravelCollection();
    }

    /**
     * @param LaravelRequest $request
     * @return void
     * @throws \Exception
     */
    public function requestToRender(Request $request) : void
    {
        $this->laravelRequest = $request;

        $success = $this->requestToContentCollection($request);

        if(!$success)
        {
            throw new \Exception('Unable to generate content entity. Unable to parse request into route then page and template entities');
        }

        $html = $this->getHtml();

        if(is_null($html))
        {
            throw new \Exception('Unable to parse Content from page.');
        }
    }


    public function getHtml() :?string
    {
        return '';
    }


    // models relations methods
    //
    // request to route (object, model, entity)
    // request to route objs + page (model, array)
    //
    // route to page
    public function requestToContentCollection(LaravelRequest $request): bool
    {
        $laravelRoute = $request->route();
        // check result
        if(is_null($laravelRoute))
        {
            return false;
        }

        $routeEntity = $this->getRouteEntityByLaravelRoute($laravelRoute);
        if(is_null($routeEntity))
        {
            return false;
        }

        $routeModel = $routeEntity->getModel();
        if(is_null($routeModel))
        {
            return false;
        }

        $pageModel = $this->getPageModel($routeModel, $laravelRoute);
        if(is_null($pageModel))
        {
            return false;
        }

        $pageEntity = $this->getPageEntityByPageModel($pageModel);
        if(is_null($pageEntity))
        {
            return false;
        }




        if( count($this->propertiesIs(null)) == 5)
        {
            $this->laravelRoute = $laravelRoute;
            $this->routeModel = $routeModel;
            $this->routeEntity = $routeEntity;
            $this->pageModel = $pageModel;
            $this->pageEntity = $pageEntity;

        }

        if( count($this->propertiesIs(null)) == 0)
        {
            return true;
        }

        return false;
    }


    public function propertiesIs(mixed $value = null) : array
    {
        $set = get_object_vars($this);
        $all =    get_class_vars(self::class);
        $all_set =    array_replace($all, $set);

        $properties = (array_filter($all_set, function($prop) use ($value) {if($value == ($prop)) {return true;}}));

        return $properties;
    }


    public function getRouteEntityByLaravelRoute(LaravelRoute $route, string $filter = 'name'): ?RouteEntity
    {
        $entities = $this->routesEntityCollection->all();

        foreach ($entities as $k => $entity) {
            if ($filter == 'name' && $entity->getName() == $route->getName()) {
                return $entity;
            }
        }
        return null;
    }

    public function getPageModel(RouteModel $routeModel, LaravelRoute $laravelRoute): ?PageModel
    {
        if( count($routeModel->pages()->getResults()->all() ) == 1)
        {
            return $routeModel->pages()->getResults()->first();
        }

        return $routeModel->pageWith($laravelRoute->parameters);
    }


    public function getPageEntityByPageModel(PageModel $pageModel): ?PageEntity
    {
        return new PageEntity($pageModel);
    }

}
