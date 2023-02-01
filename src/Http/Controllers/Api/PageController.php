<?php

namespace MbcApiContent\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MbcApiContent\Http\Resources\PageResource;
use MbcApiContent\Models\Page;

class PageController extends Controller
{

    public function index()
    {
        return PageResource::collection(Page::all());
    }

    public function indexComplete()
    {
        return PageResource::collection(Page::all()->loadMissing(['pageContents', 'route']));
    }


    public function store(Request $request)
    {
        $page = Page::create([

            'title' => $request->title,
            'description' => $request->description,
        ]);

        return new PageResource($page);
    }

    public function search(Request $request)
    {
        $column = $request->query->get('column');
        $column_value = $request->query->get('column_value');
        $relations = $request->query->get('relations') ?? null;


        if(!is_null($relations))
        {
            $page = Page::where($column, $column_value)->first()->loadMissing(['pageContents', 'route']);
        }
        else {
            $page = Page::where($column, $column_value)->first();
        }

        if($page)
        {
            return new PageResource($page);
        } else {
            return response()->json(null, 404);
        }
    }


    public function show(Page $page)
    {
        return new PageResource($page);
    }

    public function showComplete(Page $page)
    {
        return new PageResource($page->loadMissing(['pageContents', 'route']));
    }



    public function update(Request $request, $page)
    {
        $page->update($request->only(['title', 'description']));

        return new PageResource($page);
    }


    public function destroy($page)
    {
        $page->delete();

        return response()->json(null, 204);
    }
}
