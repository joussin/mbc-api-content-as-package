<?php

namespace MainNamespace\App\Http\Controllers\Rendering\Commons;


use Illuminate\Http\Request;

use MainNamespace\App\Facades\RouterFacade;
use MainNamespace\App\Services\RenderServiceInterface;

class Controller extends \App\Http\Controllers\Controller
{

    public RenderServiceInterface $renderService;

    public function __construct(RenderServiceInterface $renderService, Request $request)
    {
        $this->renderService = $renderService;

        try{
            $this->renderService->requestToRender($request);
        } catch (\Exception $e)
        {
            // page fallback
        }






    }





}
