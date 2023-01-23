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
use MainNamespace\App\Facades\RouterFacade;
use MainNamespace\App\Models\Route as RouteModel;

use MainNamespace\App\Entity\Page as PageEntity;
use MainNamespace\App\Models\Page as PageModel;

use MainNamespace\App\Entity\Template as TemplateEntity;
use MainNamespace\App\Models\Template as TemplateModel;


class RenderService implements RenderServiceInterface
{


    // ---------------------INPUT----------------------------------
    public Collection $routesEntityCollection;

    public Collection $routesModelCollection;

    public RouteCollectionInterface $routesLaravelCollection;

    public LaravelRequest $laravelRequest;


    // -----------------------OUTPUT--------------------------------

    public ?LaravelRoute $laravelRoute;

    public ?RouteEntity $routeEntity;
    public ?RouteModel $routeModel;

    public ?PageEntity $pageEntity;
    public ?PageModel $pageModel;

    public ?TemplateEntity $templateEntity;
    public ?TemplateModel $templateModel;


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
            throw new \Exception('Unable to parse template from page and template entities.');
        }
    }


    public function getHtml() :?string
    {
        return $this->pageEntity->parseTemplate();
    }


    // models relations methods
    //
    // request to route (object, model, entity)
    // request to route objs + page (model, array) + template (model, array)
    //
    // route to page
    // page to template

    // page to route et template
    // route to page et template


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

        $pageModel = $this->getPageModelByRouteModel($routeModel);
        if(is_null($pageModel))
        {
            return false;
        }


        $templateModel = $this->getTemplateModelByPageModel($pageModel);
        if(is_null($templateModel))
        {
            return false;
        }

        $templateEntity = $this->getTemplateEntityByTemplateModel($templateModel);
        if(is_null($templateEntity))
        {
            return false;
        }

        $pageEntity = $this->getPageEntityByPageModel($pageModel, $templateEntity);
        if(is_null($pageEntity))
        {
            return false;
        }

        if( count($this->propertiesIs(null)) == 7)
        {
            $this->laravelRoute = $laravelRoute;
            $this->routeModel = $routeModel;
            $this->routeEntity = $routeEntity;
            $this->pageModel = $pageModel;
            $this->pageEntity = $pageEntity;
            $this->templateModel = $templateModel;
            $this->templateEntity = $templateEntity;
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

    public function getPageModelByRouteModel(RouteModel $routeModel): ?PageModel
    {
        return $routeModel->page()->getResults();
    }


    public function getPageEntityByPageModel(PageModel $pageModel, TemplateEntity $templateEntity): ?PageEntity
    {
        return new PageEntity($pageModel, $templateEntity);
    }


    public function getTemplateModelByPageModel(PageModel $pageModel): ?TemplateModel
    {
        return $pageModel->template()->getResults();
    }


    public function getTemplateEntityByTemplateModel(TemplateModel $templateModel): ?TemplateEntity
    {
        return new TemplateEntity($templateModel);
    }


}
