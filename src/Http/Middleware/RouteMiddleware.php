<?php


namespace MbcApiContent\src\Http\Middleware;

use Illuminate\Foundation\Http\Events\RequestHandled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use MbcApiContent\src\Facades\RouterFacade;


class RouteMiddleware
{
    public function handle(Request $request, \Closure $next)
    {
        return $next($request);
    }
}
