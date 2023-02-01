<?php

namespace MbcApiContent\Http\Controllers\Rendering;


use Illuminate\Http\Request;
use MbcApiContent\Facades\RouterFacade;
use MbcApiContent\Http\Controllers\Rendering\Commons\Controller;


class MainController extends Controller
{

    public function any(Request $request)
    {

        $page = RouterFacade::getPageModel();
        $route = RouterFacade::getRouteModel();
        $pageContents = RouterFacade::getPageContentModels();
        $pageContent = RouterFacade::getPageContentModelByName('content_no_1');


        return view('api_content_views::template/' . $page->template_name, [
            'page' => $page->toArray(),
            'route' => $route->toArray(),
            'page_contents' => $pageContents->toArray(),
            'page_content_by_name' => $pageContent->toArray(),
        ]);
    }
}
