<?php

namespace MbcApiContent\App;

use MbcApiContent\App\Events\ApiContentEventInterface;
use MbcApiContent\App\Events\ApiContentEventListenerResolver;
use MbcApiContent\App\Events\ApiContentModelEvent;
use MbcApiContent\App\Facades\RouterFacade;
use MbcApiContent\App\Models\Route;
use Illuminate\Support\Facades\Schema;


class Bootstrap
{

    protected $apiContentEventListenerResolver;

   public function __construct(ApiContentEventListenerResolver $apiContentEventListenerResolver)
   {
       $this->apiContentEventListenerResolver = $apiContentEventListenerResolver;
   }

    public function initRouter()
    {
        try{
            $router = RouterFacade::initCollections();
        }
        catch (\Exception $e)
        {
            throw new \Exception('Project not configured');
        }
    }


    public function initClosureEvent(): void
    {
        $this->apiContentEventListenerResolver->setClosureEvent(function(ApiContentEventInterface $event){
            if($event instanceof ApiContentModelEvent)
            {
                \Illuminate\Support\Facades\Log::info('ApiContentEventListenerResolver->ClosureEvent(ApiContentModelEvent $event) : ', [
                    $event->getModel(),
                    $event->getAction(),
                ]);
                $event->callback();
            }
        });
    }

    /**
     * @param \Closure $closureEvent function(ApiContentEventInterface $event){};
     * @return void
     */
    public function setClosureEvent(\Closure $closureEvent): void
    {
        $this->apiContentEventListenerResolver->setClosureEvent($closureEvent);
    }



}
