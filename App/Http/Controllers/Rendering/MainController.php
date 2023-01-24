<?php

namespace MbcApiContent\App\Http\Controllers\Rendering;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use MbcApiContent\App\Facades\RouterFacade;
use MbcApiContent\App\Http\Controllers\Rendering\Commons\Controller;


class MainController extends Controller
{



    public function list(Request $request)
    {

        $routeEntityCollection = RouterFacade::getRouteEntityCollection();

        $routeEntityCollection->each(function($routeEntity){

            echo '<a href="'.$routeEntity->getUri().'" >' . $routeEntity->getName() . '</a><br>';
        });

    }

    public function dynamic(Request $request, $id)
    {


        dd('dynamic', $request->route());
    }

    public function any(Request $request)
    {

        $ar = get_object_vars($request);

        Log::info("log request as array", $ar);
        Log::info("log request as array", [
            $request->route()->getController(),
            $request->route()->getActionMethod(),
            $request->route()->getActionName(),
            $request->route()->getActionName(),
        ]);

        $json = file_get_contents("https://dummyjson.com/posts");

        $data = json_decode($json, true);




        return view('welcome2', [
            'data' => $data
        ]);
    }
}
