<?php

namespace MbcApiContent\Http\Controllers\Rendering;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use MbcApiContent\Facades\RouterFacade;
use MbcApiContent\Http\Controllers\Rendering\Commons\Controller;


class TestController extends Controller
{

    public function any(Request $request)
    {

        $routesModels = RouterFacade::getRoutesModelCollection();
        $routesModelsArr = $routesModels->all();

        $routeModel = $routesModelsArr[3];
        $routeModelArr = $routeModel->toArray();

        $pageModel = $routeModel->page();

        $pageModelArr = $pageModel->toArray();


        $pageContentsCollection = $pageModel->pageContents();
        $pageContentsCollectionArr = $pageModel->pageContents()->all();
        $pageContentsModel_1 = $pageContentsCollectionArr[0];
        $pageContentsModel_1Arr = $pageContentsModel_1->toArray();;

        dd(
            $routesModelsArr,
            $routeModel,
            $routeModelArr,
            $pageModel,
            $pageModelArr,
            $pageContentsCollection,
            $pageContentsCollectionArr,
            $pageContentsModel_1,
            $pageContentsModel_1Arr,
            RouterFacade::getRoutesModelCollection(),
            RouterFacade::getRoutesLaravelCollection(),
        );

        return 'TestController::any';
    }
}
