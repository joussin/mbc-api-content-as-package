<?php

namespace MbcApiContent\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MbcApiContent\Http\Resources\PageContentResource;
use MbcApiContent\Models\PageContent;

class PageContentController extends Controller
{

    public function index()
    {
        return PageContentResource::collection(PageContent::all());
    }


    public function store(Request $request)
    {
        $pageContent = PageContent::create([

            'title' => $request->title,
            'description' => $request->description,
        ]);

        return new PageContentResource($pageContent);
    }


    public function show(PageContent $pageContent)
    {
        return new PageContentResource($pageContent);
    }


    public function update(Request $request, $pageContent)
    {
        $pageContent->update($request->only(['title', 'description']));

        return new PageContentResource($pageContent);
    }


    public function destroy($pageContent)
    {
        $pageContent->delete();

        return response()->json(null, 204);
    }
}
