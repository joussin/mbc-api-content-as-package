<?php

namespace MbcApiContent\Entity;

use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Support\Str;
use MbcApiContent\Entity\Traits\RouteEntityValidatorTrait;
use MbcApiContent\Http\Controllers\Rendering\MainController;

class Route extends BaseEntity
{
    use RouteEntityValidatorTrait;

    public const DEFAULT_NAMESPACE = "MbcApiContent\Http\Controllers\Rendering\\";


    /**
     * @var LaravelRoute $route
     */
    protected $route;

    protected $defaults = [];

    protected $middleware = [];

    protected $route_action;


    // mandatory properties
    public $id;

    public $method;

    public $protocol;

    public $name;

    public $uri;

    // nullable properties
    public $controller_name = MainController::class;
    public $controller_action = 'any';
    public $path_parameters;
    public $query_parameters;
    public $static_uri;
    public $static_doc_name;
    public $domain;
    public $rewrite_rule;
    public $status;
    public $active_start_at;
    public $active_end_at;

    public $created_at;
    public $updated_at;


    public function __construct(\MbcApiContent\Models\Route $routeModel)
    {
        parent::__construct($routeModel);

        $validateControllerName = $this
            ->validateControllerName(
                $routeModel->controller_name,
                self::DEFAULT_NAMESPACE,
                true
            );

        $validateControllerAction = $this
            ->validateControllerAction(
                $routeModel->controller_name,
                $routeModel->controller_action,
                self::DEFAULT_NAMESPACE,
                true
            );


        $this->assignProp($routeModel->toArray());

        if (!\str_contains($this->controller_name, '\\')) {
            $this->controller_name = self::DEFAULT_NAMESPACE . $this->controller_name;
        }

        $this->method = strtoupper($routeModel->method);

        $this->route_action = [$this->controller_name, $this->controller_action];
    }



    /**
     * Try to find RouteEntity by its name in RouteEntityCollection
     *
     * Only for RouteEntity
     * $patterns can be string, string[]
     * pattern wildcard * : '*-*-r*'
     *
     * @param ...$patterns
     * @return bool
     */
    public function named(...$patterns) : bool
    {
        if (is_null($routeName = $this->getName())) {
            return false;
        }

        foreach ($patterns as $pattern) {
            if (Str::is($pattern, $routeName)) {
                return true;
            }
        }

        return false;
    }


    /**
     * @param \Illuminate\Routing\Route $route
     */
    public function setRoute(\Illuminate\Routing\Route $route): void
    {
        $this->route = $route;
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

    /**
     * @return LaravelRoute
     */
    public function getRoute(): LaravelRoute
    {
        return $this->route;
    }

    /**
     * @return array
     */
    public function getDefaults(): array
    {
        return $this->defaults;
    }

    /**
     * @return array
     */
    public function getMiddleware(): array
    {
        return $this->middleware;
    }

    /**
     * @return array
     */
    public function getRouteAction(): array
    {
        return $this->route_action;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function getControllerName(): string
    {
        return $this->controller_name;
    }

    /**
     * @return string
     */
    public function getControllerAction(): string
    {
        return $this->controller_action;
    }

    /**
     * @return mixed
     */
    public function getPathParameters()
    {
        return $this->path_parameters;
    }

    /**
     * @return mixed
     */
    public function getQueryParameters()
    {
        return $this->query_parameters;
    }

    /**
     * @return mixed
     */
    public function getStaticUri()
    {
        return $this->static_uri;
    }

    /**
     * @return mixed
     */
    public function getStaticDocName()
    {
        return $this->static_doc_name;
    }

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @return mixed
     */
    public function getRewriteRule()
    {
        return $this->rewrite_rule;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getActiveStartAt()
    {
        return $this->active_start_at;
    }

    /**
     * @return mixed
     */
    public function getActiveEndAt()
    {
        return $this->active_end_at;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}
