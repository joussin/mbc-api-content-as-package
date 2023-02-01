<?php

namespace MbcApiContent\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MbcApiContent\Http\Resources\RouteResource;
use MbcApiContent\Models\Route;
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
        $route = Route::create([

            'title' => $request->title,
            'description' => $request->description,
        ]);

        return new RouteResource($route);
    }



    public function search(Request $request)
    {
        $column = $request->query->get('column');
        $column_value = $request->query->get('column_value');
        $relations = $request->query->get('relations') ?? null;


        if(!is_null($relations))
        {
            $route = Route::where($column, $column_value)->get()->loadMissing(['page']);
        }
        else {
            $route = Route::where($column, $column_value)->get();
        }

        if($route && count($route) > 1)
        {
            return RouteResource::collection($route);
        }
        elseif($route && count($route) == 1)
        {
            return new RouteResource($route);
        }
        else {
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
        $route->update($request->only(['title', 'description']));

        return new RouteResource($route);
    }


    public function destroy($route)
    {
        $route->delete();

        return response()->json(null, 204);
    }
}
