<?php

namespace MbcApiContent\Http\Controllers\Rendering;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use MbcApiContent\Facades\RouterFacade;
use MbcApiContent\Http\Controllers\Rendering\Commons\Controller;


class MainController extends Controller
{


    public function any(Request $request)
    {

        return 'MainController-any';
    }

    public function dynamic(Request $request)
    {

        return 'MainController-dynamic';
    }
}
