<?php

namespace MbcApiContent\Http\Controllers\Api\Test;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MbcApiContent\Facades\RouterFacade;
use function MbcApiContent\Http\Controllers\Test\view;

class TestController extends Controller
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
            'page_contents' => ($pageContents) ? $pageContents->toArray() : null,
            'page_content_by_name' => ($pageContent) ? $pageContent->toArray() : null,
        ]);
    }
}
