<?php

namespace MbcApiContent\src\Entity\Traits;

use MbcApiContent\src\Models\Route as RouteModel;

trait RouteEntityTrait
{

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



    public function getModel(): ?RouteModel
    {
        return $this->model;
    }

    /**
     * @return mixed|string
     */
    public function uri(): mixed
    {
        return $this->uri;
    }

    /**
     * @return mixed|string
     */
    public function getUri(): mixed
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
     * @return array
     */
    public function getRouteAction(): array
    {
        return $this->route_action;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
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
     * @return \Illuminate\Routing\Route
     */
    public function getRoute(): \Illuminate\Routing\Route
    {
        return $this->route;
    }

    /**
     * @param \Illuminate\Routing\Route $route
     */
    public function setRoute(\Illuminate\Routing\Route $route): void
    {
        $this->route = $route;
    }



    /**
     * @return mixed
     */
    public function getProtocol(): mixed
    {
        return $this->protocol;
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
    public function getDomain(): mixed
    {
        return $this->domain;
    }

    /**
     * @return mixed
     */
    public function getRewriteRule(): mixed
    {
        return $this->rewrite_rule;
    }

    /**
     * @return mixed
     */
    public function getStatus(): mixed
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getActiveStartAt(): mixed
    {
        return $this->active_start_at;
    }

    /**
     * @return mixed
     */
    public function getActiveEndAt(): mixed
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
