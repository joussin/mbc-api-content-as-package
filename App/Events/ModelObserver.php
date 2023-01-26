<?php

namespace MbcApiContent\App\Events;

class ModelObserver
{

    public \Closure $closureEvent;

    public function __construct()
    {
        $this->closureEvent = function(Illuminate\Database\Eloquent\Model $model){
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

    public function created(Illuminate\Database\Eloquent\Model $model)
    {
        $this->closureEvent($model);
    }

    
    public function updated(Illuminate\Database\Eloquent\Model $model)
    {
        $this->closureEvent($model);
    }
 
    public function deleted(Illuminate\Database\Eloquent\Model $model)
    {
        $this->closureEvent($model);
    }

   
    public function restored(Illuminate\Database\Eloquent\Model $model)
    {
        $this->closureEvent($model);
    }

   
    public function forceDeleted(Illuminate\Database\Eloquent\Model $model)
    {
        $this->closureEvent($model);
    }
}