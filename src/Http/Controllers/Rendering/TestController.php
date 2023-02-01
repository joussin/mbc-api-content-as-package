<?php

namespace MbcApiContent\Http\Controllers\Rendering;

use MbcApiContent\Facades\RouterFacade;


class TestController extends \App\Http\Controllers\Controller
{

    public function debug()
    {
        return 'TestController->debug()';
        dd(
            RouterFacade::debug()
        );
    }
}
