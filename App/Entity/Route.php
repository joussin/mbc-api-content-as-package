<?php

namespace MainNamespace\App\Entity;

use Illuminate\Routing\Route as LaravelRoute;
use MainNamespace\App\Entity\Interfaces\EntityInterface;
use MainNamespace\App\Entity\Traits\HydrateEntityTrait;
use MainNamespace\App\Entity\Traits\RouteEntityTrait;
use MainNamespace\App\Entity\Traits\RouteEntityValidatorTrait;
use MainNamespace\App\Entity\Validators\ValidationRules;
use MainNamespace\App\Http\Controllers\Rendering\MainController;
use MainNamespace\App\Models\Route as RouteModel;


class Route implements EntityInterface
{
    use HydrateEntityTrait;

    use RouteEntityValidatorTrait;

    use RouteEntityTrait;



    public const DEFAULT_NAME_PREFIX = "DEFAULT_NAME_PREFIX";

    public const DEFAULT_NAMESPACE = "MainNamespace\App\Http\Controllers\Rendering\\";

    /**
     * @var RouteModel
     */
    protected $model;

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

        $this->route_action = [$this->controller_name, $this->controller_action];

        $this->model = $routeModel;
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
