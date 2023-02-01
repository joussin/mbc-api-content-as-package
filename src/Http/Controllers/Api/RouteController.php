<?php

namespace MbcApiContent\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MbcApiContent\Http\Resources\RouteResource;
use MbcApiContent\Models\Route;

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
