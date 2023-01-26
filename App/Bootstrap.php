<?php

namespace MbcApiContent\App;

use MbcApiContent\App\Events\ApiContentEventInterface;
use MbcApiContent\App\Events\ApiContentEventListenerResolver;
use MbcApiContent\App\Events\ModelChangedEvent;
use MbcApiContent\App\Events\ModelObserver;
use MbcApiContent\App\Facades\RouterFacade;
use MbcApiContent\App\Models\Page;
use MbcApiContent\App\Models\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Event;
use MbcApiContent\App\Models\Template;
use Spatie\Export\Exporter;

class Bootstrap
{

    protected $apiContentEventListenerResolver;
    protected $exporter;

    public function __construct(ApiContentEventListenerResolver $apiContentEventListenerResolver, Exporter $exporter)
    {
        $this->apiContentEventListenerResolver = $apiContentEventListenerResolver;
        $this->exporter = $exporter;
    }

    public function init()
    {
        $this->initRouter();
        $this->initModelObserver();
        $this->initClosureEvent();

        $this->exporter->paths( RouterFacade::getRoutesEntityCollection());
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


    public function initModelObserver(): void
    {
        Page::observe(ModelObserver::class);
        Route::observe(ModelObserver::class);
        Template::observe(ModelObserver::class);
    }

    public function initClosureEvent(): void
    {
        Event::listen(function (ApiContentEventInterface $event) {
            $this->apiContentEventListenerResolver->getClosureEvent()($event);
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
