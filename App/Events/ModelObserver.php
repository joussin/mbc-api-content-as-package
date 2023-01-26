<?php

namespace MbcApiContent\App\Events;

use MbcApiContent\App\Models\ModelInterface;

class ModelObserver
{

    public \Closure $closureEvent;

    public function __construct()
    {
        $this->closureEvent = function(ModelInterface $model){
            \Illuminate\Support\Facades\Log::info('ModelObserver closureEvent = ');
        };
    }

    /**
     * @return \Closure
     */
    public function getClosureEvent(): \Closure
    {
        return $this->closureEvent;
    }

    /**
     * @param \Closure $closureEvent
     */
    public function setClosureEvent(\Closure $closureEvent): void
    {
        $this->closureEvent = $closureEvent;
    }

    public function __call($method, $args)
    {
        if(is_callable(array($this, $method))) {
            return call_user_func_array($this->$method, $args);
        }
        // else throw exception
    }

    public function created(ModelInterface $model)
    {
        $this->closureEvent($model);

        event(new ApiContentModelEvent());
    }

    
    public function updated(ModelInterface $model)
    {
        $this->closureEvent($model);
        event(new ApiContentModelEvent());
    }
 
    public function deleted(ModelInterface $model)
    {
        $this->closureEvent($model);
        event(new ApiContentModelEvent());
    }

   
    public function restored(ModelInterface $model)
    {
        $this->closureEvent($model);
        event(new ApiContentModelEvent());
    }

   
    public function forceDeleted(ModelInterface $model)
    {
        $this->closureEvent($model);
        event(new ApiContentModelEvent());
    }
}