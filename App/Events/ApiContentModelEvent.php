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

    public function callback() : mixed
    {
        $method = $this->getCallbackMethod();
        $modelClass = $this->getModelClass();

        if(method_exists($modelClass, $method ))
        {
            return $this->model->$method();
        }
        return null;
    }
}
