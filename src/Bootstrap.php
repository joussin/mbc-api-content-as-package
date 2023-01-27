<?php

namespace MbcApiContent;

use MbcApiContent\Events\ApiContentEventListener;
use MbcApiContent\Facades\RouterFacade;
use Illuminate\Support\Facades\Schema;

class Bootstrap
{

    public ApiContentEventListener $apiContentEventListener;


    public function __construct(ApiContentEventListener $apiContentEventListener)
    {
        $this->apiContentEventListener = $apiContentEventListener;

    }

    public function init(bool $initRouter = true, bool $initListener = true )
    {
        $this->initRouter();

        $this->apiContentEventListener->initListener($initListener);
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


}
