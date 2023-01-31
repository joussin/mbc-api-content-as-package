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


        $laravelRoute = RouterFacade::getLaravelRoute();
        $routeModel = RouterFacade::getRouteModel();
        $pageModel = RouterFacade::getPageModel();

        $pageContentsCollection = RouterFacade::getPageContentModels();




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
