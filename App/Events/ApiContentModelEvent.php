<?php

namespace MbcApiContent\App\Events;

use MbcApiContent\App\Models\ModelInterface;

class ApiContentModelEvent extends ApiContentEvent
{

    protected ModelInterface $model;

    protected string $action;

    public function __construct(ModelInterface $model, string $action)
    {
        $this->model = $model;
        $this->action = $action;
    }

    /**
     * @return ModelInterface
     */
    public function getModel(): ModelInterface
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }


    public function getModelClass() : string
    {
        return get_class($this->model);
    }

    public function getCallbackMethod() : string
    {
        return $this->action . 'EventCallback';
    }

    public function isCallbackImplemented($modelClass, $method) : bool
    {
        if(!method_exists($modelClass, $method ))
        {
            return false;
        }
        $reflectionClass = new \ReflectionClass($modelClass);
        if ($reflectionClass->getMethod($method)->class == $modelClass) {
            return true;
        }
        return false;
    }

    public function callback() : mixed
    {
        $method = $this->getCallbackMethod();
        $modelClass = $this->getModelClass();

        if($this->isCallbackImplemented($modelClass, $method))
        {
            return $this->model->$method();
        }
        return null;
    }
}
