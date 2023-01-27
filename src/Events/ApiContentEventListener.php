<?php

namespace MbcApiContent\src\Events;

use Illuminate\Support\Facades\Event;
use MbcApiContent\src\Models\Page;
use MbcApiContent\src\Models\Route;

class ApiContentEventListener
{

    /**
     * @var bool
     */
    protected bool $modelsObservables;

    /**
     * @var \Closure|null
     */
    protected ?\Closure $modelEventClosure;


    /**
     * @var array \Closure[]
     */
    protected array $eventClosureList = [];


    public function __construct()
    {
    }

    //  $this->initListener(); // dans Bootstrap
    public function initListener(bool $modelsObservables = true): void
    {

        $this->setModelsObservables($modelsObservables);

        $this->setModelEventClosure(
            function(ApiContentEventInterface $event){

                if($event instanceof ModelChangedEvent)
                {
                    \Illuminate\Support\Facades\Log::info('$event instanceof ApiContentModelEvent', [
                        $event->getModelInstance(),
                        $event->getAction(),
                        $event->getModelClass(),
                        $event->getCallbackMethodName(),
                    ]);

                    $event->callback();
                }
            }
        );


        Event::listen(function (ApiContentEventInterface $event) {

            if ($this->isModelsObservables() && !is_null($this->modelEventClosure) )
            {
                $this->getModelEventClosure()($event);
            }



            foreach ($this->getEventClosureList() as $eventClosure)
            {
//                if($event instanceof ModelChangedEvent)
//                {
//                }


                if(is_callable($eventClosure))
                {
                    $eventClosure($event);
                }



            }

        });

    }

    /**
     * @return bool
     */
    public function isModelsObservables(): bool
    {
        return $this->modelsObservables;
    }

    /**
     * @param bool $modelsObservables
     */
    public function setModelsObservables(bool $modelsObservables): void
    {
        $this->modelsObservables = $modelsObservables;
        $this->setModelObservable($modelsObservables);
    }



    private function setModelObservable(bool $modelsObservables): void
    {
        if($this->isModelsObservables())
        {
            Page::observe(ModelObserver::class);
            Route::observe(ModelObserver::class);
        } else {
            $eventActions = ModelChangedEvent::MODEL_ACTIONS;

            foreach ($eventActions as $eventAction)
            {
                Page::getEventDispatcher()->forget("eloquent.$eventAction: MbcApiContent\App\Models\Page");
                Route::getEventDispatcher()->forget("eloquent.$eventAction: MbcApiContent\App\Models\Route");
            }
        }
    }



    public function getModelEventClosure(): ?\Closure
    {
        return $this->modelEventClosure;
    }


    public function setModelEventClosure(?\Closure $modelEventClosure): void
    {
        $this->modelEventClosure = $modelEventClosure;
    }





    // ------------------------------------------------------------------------------------
    // OTHER EVENTS
    // ------------------------------------------------------------------------------------

    /**
     * @param \Closure $eventClosure
     * @return void
     */
    public function addEventClosureToList(\Closure $eventClosure): void
    {
        $this->eventClosureList[] = $eventClosure;
    }

    /**
     * @return array
     */
    public function getEventClosureList(): array
    {
        return $this->eventClosureList;
    }


//    /**
//     * @return \Closure
//     */
//    public function getEventClosureListAsClosure(): \Closure
//    {
//        return $this->eventClosureListAsClosure;
//    }
//
//
//
//    public function initEventClosureListAsClosure(): \Closure
//    {
//
//         $this->eventClosureListAsClosure = function(){};
//
//        foreach ($this->eventClosureList as $eventClosure)
//        {
//            // $eventClosure();
//        }
//
//    }






}