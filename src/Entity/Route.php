<?php

namespace MbcApiContent\Entity;

use Illuminate\Routing\Route as LaravelRoute;
use MbcApiContent\Entity\Interfaces\EntityInterface;
use MbcApiContent\Entity\Traits\HydrateEntityTrait;
use MbcApiContent\Entity\Traits\RouteEntityTrait;
use MbcApiContent\Entity\Traits\RouteEntityValidatorTrait;
use MbcApiContent\Entity\Validators\ValidationRules;
use MbcApiContent\Http\Controllers\Rendering\MainController;
use MbcApiContent\Models\Route as RouteModel;

use Illuminate\Database\Eloquent\Model;

class Route implements EntityInterface
{
    use HydrateEntityTrait;

    use RouteEntityValidatorTrait;

    use RouteEntityTrait;



    public const DEFAULT_NAME_PREFIX = "DEFAULT_NAME_PREFIX";

    public const DEFAULT_NAMESPACE = "MbcApiContent\Http\Controllers\Rendering\\";




    /**
     * @var Model
     */
    public $model;


    /**
     * @var LaravelRoute $route
     */
    protected $route;

    protected $defaults = [];

    protected $middleware = [];

    protected $route_action;


    // mandatory properties
    protected $id;

    protected $method;

    protected $protocol;

    protected $name;

    protected $uri;

    // nullable properties
    protected $controller_name = MainController::class;

    protected $controller_action = 'any';

    protected $path_parameters;
    protected $query_parameters;
    protected $static_uri;
    protected $static_doc_name;
    protected $domain;
    protected $rewrite_rule;
    protected $status;
    protected $active_start_at;
    protected $active_end_at;

    protected $created_at;
    protected $updated_at;


    public function __construct(RouteModel $routeModel)
    {
        $modelAsArray = $routeModel->toArray();

        $validate = $this->validate($modelAsArray, ValidationRules::ROUTE_RULES, true);

        $validateControllerName = $this
            ->validateControllerName(
                $modelAsArray['controller_name'] ?? null,
                self::DEFAULT_NAMESPACE,
                true
            );

        $validateControllerAction = $this
            ->validateControllerAction(
                $modelAsArray['controller_name'] ?? null,
                $modelAsArray['controller_action'] ?? null,
                self::DEFAULT_NAMESPACE,
                true
            );


        $this->method = strtoupper($modelAsArray['method']);
        $this->protocol = $modelAsArray['protocol'];
        $this->name = $modelAsArray['name'];
        $this->uri = $modelAsArray['uri'];

        $modelAsArray = $this->assignProp($modelAsArray);

        if (!\str_contains($this->controller_name, '\\')) {
            $this->controller_name = self::DEFAULT_NAMESPACE . $this->controller_name;
        }

        $this->route_action = [$this->controller_name, $this->controller_action];

        $this->model = $routeModel;
    }



    public function getModel(): ?Model
    {
        return $this->model;
    }


    public function validate(): string
    {
        return (isset($this->name) ? $this->name : '');
    }


    public function getName(): string
    {
        return (isset($this->name) ? $this->name : '');
    }


    public function addRouteOptions(): LaravelRoute
    {
        $this->addRouteDefaults('id', $this->getId());
        $this->setRouteName($this->name);
//        $this->setRouteName(self::DEFAULT_NAME_PREFIX . '_' . $this->name);
        $this->addRouteMiddleware("router.middleware");

        return $this->route;
    }


    public function setRouteName($name): LaravelRoute
    {
        $this->route->name($name);

        return $this->route;
    }

    public function addRouteMiddleware(string $middleware): LaravelRoute
    {
        $this->middleware[] = $middleware;

        $this->route->middleware($this->middleware);

        return $this->route;
    }

    public function addRouteDefaults($key, $value): LaravelRoute
    {
        $this->defaults[$key] = $value;

        $this->route->setDefaults($this->defaults);

        return $this->route;
    }


}
