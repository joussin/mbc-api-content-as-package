<?php

namespace MbcApiContent\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MbcApiContent\Http\Resources\RouteResource;
use MbcApiContent\Models\Route;
use MbcApiContent\Validators\ValidationRules;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RouteController extends Controller
{

    public function index()
    {
        return RouteResource::collection(Route::all());
    }


    public function indexComplete()
    {
        return RouteResource::collection(Route::all()->loadMissing(['page']));
    }


    public function store(Request $request)
    {
//        $validated = $this->validate($request, ValidationRules::ROUTE_RULES);

        $route = Route::create([
            "method"            => $request->post('method') ?? 'GET',
            "protocol"          => $request->post('protocol') ?? 'http',
            "name"              => $request->post('name'),
            "uri"               => $request->post('uri'),
            "pattern"           => $request->post('pattern') ?? null,
            "controller_name"   => null,
            "controller_action" => null,
            "path_parameters"   => null,
            "query_parameters"  => null,
            "static_doc_name"   => $request->post('static_doc_name') ?? 'index.html',
            "static_uri"        => $request->post('static_uri') ?? $request->post('uri') .'/index.html',
            "domain"            => null,
            "rewrite_rule"      => null,
            "status"            => $request->post('status') ?? 'ONLINE',
            "active_start_at"   => null,
            "active_end_at"     => null
        ]);

        return new RouteResource($route);
    }


    public function search(Request $request)
    {
        $column = $request->query->get('column');
        $column_value = $request->query->get('column_value');
        $relations = $request->query->get('relations') ?? null;


        if (!is_null($relations)) {
            $route = Route::where($column, $column_value)->get()->loadMissing(['page']);
        } else {
            $route = Route::where($column, $column_value)->get();
        }

        if ($route && count($route) > 1) {
            return RouteResource::collection($route);
        } elseif ($route && count($route) == 1) {
            return new RouteResource($route);
        } else {
            return response()->json(null, 404);
        }
    }

    public function show(Route $route)
    {
        return new RouteResource($route);
    }

    public function showComplete(Route $route)
    {
        return new RouteResource($route->loadMissing(['page']));
    }


    public function update(Request $request, $route)
    {
        //$validated = $this->validate($request, str_replace('required|', '', ValidationRules::ROUTE_RULES));

        $route->update($request->only(
            [
                "method",
                "protocol",
                "name",
                "uri",
                "pattern",
//                "controller_name",
//                "controller_action",
//                "path_parameters",
//                "query_parameters",
                "static_doc_name",
                "static_uri",
//                "domain",
//                "rewrite_rule",
                "status",
//                "active_start_at",
//                "active_end_at"
            ]
        ));

        return new RouteResource($route);
    }


    public function destroy($route)
    {
        $route->delete();

        return response()->json(null, 204);
    }
}
