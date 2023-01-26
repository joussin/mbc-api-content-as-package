<?php

namespace MbcApiContent\App\Http\Controllers\Rendering;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use MbcApiContent\App\Facades\RouterFacade;
use MbcApiContent\App\Http\Controllers\Rendering\Commons\Controller;


class MainController extends Controller
{


    public function any(Request $request)
    {
        return 'MainController-any';
    }


//    public function test(Request $request)
//    {
//
//        $ar = get_object_vars($request);
//
//        Log::info("log request as array", $ar);
//        Log::info("log request as array", [
//            $request->route()->getController(),
//            $request->route()->getActionMethod(),
//            $request->route()->getActionName(),
//            $request->route()->getActionName(),
//        ]);
//
//        $json = file_get_contents("https://dummyjson.com/posts");
//
//        $data = json_decode($json, true);
//
//        return view('welcome2', [
//            'data' => $data
//        ]);
//    }
}
