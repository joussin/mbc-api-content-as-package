<?php

namespace MbcApiContent\src\Events;

use MbcApiContent\src\Models\ModelInterface;

class ModelChangedEvent extends BaseEvent
{

    protected ModelInterface $modelInstance;

    protected string $action;

    public const MODEL_CREATED = 'created';
    public const MODEL_UPDATED = 'updated';
    public const MODEL_DELETED = 'deleted';
    public const MODEL_RESTORED = 'restored';
    public const MODEL_FORCE_DELETED = 'forceDeleted';

    // ModelChangedEvent::MODEL_ACTIONS
    public const MODEL_ACTIONS = [
        self::MODEL_CREATED,
        self::MODEL_UPDATED,
        self::MODEL_DELETED,
        self::MODEL_RESTORED,
        self::MODEL_FORCE_DELETED,
    ];

    public function __construct(ModelInterface $modelInstance, string $action)
    {
        $this->modelInstance = $modelInstance;
        $this->action = $action;
    }

    /**
     * @return ModelInterface
     */
    public function getModelInstance(): ModelInterface
    {
        return $this->modelInstance;
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
        return get_class($this->modelInstance);
    }

    public function getCallbackMethodName() : string
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

    public function callback(mixed $callbackArgs = null) : mixed
    {
        $method = $this->getCallbackMethodName();
        $modelClass = $this->getModelClass();

        if($this->isCallbackImplemented($modelClass, $method))
        {
            return $this->modelInstance->$method();
        }
        return null;
    }
}
