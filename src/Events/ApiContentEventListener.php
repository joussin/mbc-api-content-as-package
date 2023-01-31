<?php

namespace MbcApiContent\Events;

use Illuminate\Support\Facades\Event;

class ApiContentEventListener
{



    /**
     * @var array \Closure[]
     */
    protected array $eventClosureList = [];


    public function __construct()
    {
    }



    //  $this->initListener(); // dans Bootstrap
    public function initListener(bool $listen = true): void
    {


        Event::listen(function (ApiContentEventInterface $event) {

//            if($listen)

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