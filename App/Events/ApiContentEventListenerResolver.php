<?php

namespace MbcApiContent\App\Events;


class ApiContentEventListenerResolver
{

    public \Closure $closureEvent;

    public function __construct()
    {
        $this->closureEvent = function(ApiContentEventInterface $event){$event->callback();};
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


//
//
//    public function __call($method, $args)
//    {
//        if(is_callable(array($this, $method))) {
//            return call_user_func_array($this->$method, $args);
//        }
//        // else throw exception
//    }


}