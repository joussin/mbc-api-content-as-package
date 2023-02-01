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
        $column = $request->query->get('column');
        $column_value = $request->query->get('column_value');
        $relations = $request->query->get('relations') ?? null;


        if(!is_null($relations))
        {
            $pageContent = PageContent::where($column, $column_value)->first()->loadMissing(['page']);
        }
        else {
            $pageContent = PageContent::where($column, $column_value)->first();
        }

        if($pageContent && count($pageContent) > 1)
        {
            return PageContentResource::collection($pageContent);
        }
        elseif($pageContent && count($pageContent) == 1)
        {
            return new PageContentResource($pageContent);
        }
        else {
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
