<?php

namespace MbcApiContent\Http\Controllers\Rendering;


use Illuminate\Http\Request;
use MbcApiContent\Http\Controllers\Rendering\Commons\Controller;


class MainController extends Controller
{

    public function any(Request $request)
    {
        return 'MainController::any';
    }
}
