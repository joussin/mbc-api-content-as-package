<?php

namespace MbcApiContent\App\Events;


class ApiContentEventListenerResolver
{

    public \Closure $closureEvent;

    public function __construct()
    {
        $this->closureEvent = function(ApiContentEventInterface $event){

            \Illuminate\Support\Facades\Log::info('ApiContentEventListenerResolver->ClosureEvent()');

            if($event instanceof ModelChangedEvent)
            {
                \Illuminate\Support\Facades\Log::info('$event instanceof ApiContentModelEvent', [
                    $event->getModel(),
                    $event->getAction(),
                    $event->getModelClass(),
                    $event->getCallbackMethod(),
                ]);
            }

            if($event instanceof StaticFilesChangedEvent)
            {
                \Illuminate\Support\Facades\Log::info('$event instanceof StaticFilesChangedEvent', [
                    $event->getFilename(),
                    $event->getAction()
                ]);
            }

            $event->callback();
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

}