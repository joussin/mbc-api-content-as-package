<?php


namespace MbcApiContent\Http\Middleware;

use Illuminate\Foundation\Http\Events\RequestHandled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use MbcApiContent\Facades\RouterFacade;


class RouteMiddleware
{
    public function handle(Request $request, \Closure $next)
    {
        return $next($request);
    }
}
