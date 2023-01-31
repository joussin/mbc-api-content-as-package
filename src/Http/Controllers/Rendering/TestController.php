<?php

namespace MbcApiContent\Http\Controllers\Rendering;


use Illuminate\Http\Request;

use MbcApiContent\Facades\RouterFacade;


class TestController extends \App\Http\Controllers\Controller
{


    public function any(Request $request)
    {

        $routesModelsCollection = RouterFacade::getRoutesModelCollection();
        $routesLaravelCollection = RouterFacade::getRoutesLaravelCollection();


        $laravelRoute = RouterFacade::getLaravelRequestRoute($request);
        $routeModel = RouterFacade::getRouteModelByLaravelRoute($laravelRoute);



        $pageModel = $routeModel->page();
        $pageContentsCollection = $routeModel->pageContents();
//        $pageContentsCollection = $pageModel ? $pageModel->pageContents()->all() : null;


        $result = [
            'TestController::any'       => 'TestController::any',
            '---------ROUTES---------'  => '---------ROUTES---------',
            '$routesModelsCollection'   => $routesModelsCollection->all(),
            '$routesLaravelCollection'  => $routesLaravelCollection->getRoutes(),
            '---------REQUEST---------' => '---------REQUEST---------',
            '$request'                  => $request,
            '$laravelRoute'             => $laravelRoute,
            '---------MODELS---------'  => '---------MODELS---------',
            '$routeModel'               => $routeModel,
            '$pageModel'                => $pageModel,
            '$pageContentsCollection'   => $pageContentsCollection
        ];



        dd($result);
    }
}
