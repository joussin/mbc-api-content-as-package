<?php

namespace MainNamespace\App;

use MainNamespace\App\Facades\RouterFacade;
use Illuminate\Support\Facades\Schema;

class Bootstrap
{

    public function __construct()
    {
    }

    public function init()
    {
        if( Schema::connection('mysql')->hasTable('route') )
        {
            $router = RouterFacade::initCollections();
        }
    }


}