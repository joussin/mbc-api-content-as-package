<?php

namespace MbcApiContent\Http\Controllers\Rendering\Commons;


use Illuminate\Http\Request;
use MbcApiContent\Services\RenderServiceInterface;

class Controller extends \App\Http\Controllers\Controller
{

    public RenderServiceInterface $renderService;

    public function __construct(RenderServiceInterface $renderService, Request $request)
    {
        $this->renderService = $renderService;
        $this->renderService->requestToRender($request);
    }

}
