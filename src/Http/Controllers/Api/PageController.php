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