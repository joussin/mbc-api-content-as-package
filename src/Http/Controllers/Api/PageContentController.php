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

    public function indexComplete()
    {
        return PageContentResource::collection(PageContent::all()->loadMissing(['page']));
    }


    public function store(Request $request)
    {
        $pageContent = PageContent::create([

            'title' => $request->title,
            'description' => $request->description,
        ]);

        return new PageContentResource($pageContent);
    }


    public function search(Request $request)
    {

        $name = $request->query->get('name');
        $relations = $request->query->get('relations') ?? null;

        $column = 'name';

        if(!is_null($relations))
        {
            $pageContent = PageContent::where($column, $name)->first()->loadMissing(['page']);
        }
        else {
            $pageContent = PageContent::where($column, $name)->first();
        }

        if($pageContent)
        {
            return new PageContentResource($pageContent);
        } else {
            return response()->json(null, 404);
        }
    }

    public function show(PageContent $pageContent)
    {
        return new PageContentResource($pageContent);
    }

    public function showComplete(PageContent $pageContent)
    {
        return new PageContentResource($pageContent->loadMissing(['page']));
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
