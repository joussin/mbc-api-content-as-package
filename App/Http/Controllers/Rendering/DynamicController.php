<?php

namespace MbcApiContent\App\Http\Controllers\Rendering;

use Illuminate\Http\Request;
use MbcApiContent\App\Facades\RouterFacade;
use MbcApiContent\App\Http\Controllers\Rendering\Commons\Controller;


class DynamicController extends Controller
{

    public function any(Request $request, $id)
    {
        return 'DynamicController-any';
    }

    public function dynamic(Request $request, $id)
    {
        return 'DynamicController-dynamic';
    }

}
