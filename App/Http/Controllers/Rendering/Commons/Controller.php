<?php

namespace MbcApiContent\App\Http\Controllers\Rendering\Commons;


use Illuminate\Http\Request;

use MbcApiContent\App\Facades\RouterFacade;
use MbcApiContent\App\Services\RenderServiceInterface;

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
