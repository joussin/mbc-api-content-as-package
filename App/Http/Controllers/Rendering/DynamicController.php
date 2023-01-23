<?php

namespace MainNamespace\App\Http\Controllers\Rendering;

use Illuminate\Http\Request;
use MainNamespace\App\Facades\RouterFacade;
use MainNamespace\App\Http\Controllers\Rendering\Commons\Controller;


class DynamicController extends Controller
{

    public function dynamic(Request $request, $id)
    {




        $udif = RouterFacade::getRoutesEntityCollection()->diffRoutes(RouterFacade::getRoutesLaravelCollection());
        $common = RouterFacade::getRoutesEntityCollection()->intersectRoutes(RouterFacade::getRoutesLaravelCollection());


        dd(
            [
                'laravel'=>RouterFacade::getRoutesLaravelCollection(),
            'custom'=>RouterFacade::getRoutesEntityCollection(),
            'diff'=>$udif,
            'common'=>$common
            ]
        );



        dd(
            RouterFacade::geAllRoutesCollections()
        );

        dd(
            'dynamic',
            $request->route(),
            $this->renderingEntity,
            $id
        );
    }

}
