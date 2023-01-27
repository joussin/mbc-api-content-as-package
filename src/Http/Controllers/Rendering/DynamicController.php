<?php

namespace MbcApiContent\src\Http\Controllers\Rendering;

use Illuminate\Http\Request;
use MbcApiContent\src\Facades\RouterFacade;
use MbcApiContent\src\Http\Controllers\Rendering\Commons\Controller;


class DynamicController extends Controller
{


    public function dynamic(Request $request, $id)
    {
        return 'DynamicController-dynamic';
    }

}
