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

    public function callback() : mixed
    {
        // example :
//        $page->createdEventCallback()
        $method = $this->action . 'EventCallback';

        $result = $this->model->$method();


        return $result;
    }
}