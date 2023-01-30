<?php

namespace MbcApiContent\Http\Controllers\Rendering;

use Illuminate\Http\Request;
use MbcApiContent\Facades\RouterFacade;
use MbcApiContent\Http\Controllers\Rendering\Commons\Controller;


class DynamicController extends Controller
{


    public function dynamic(Request $request, $id)
    {
        return 'DynamicController-dynamic';
    }


    public function static(Request $request, $id)
    {
        return 'DynamicController-static';
    }

}
