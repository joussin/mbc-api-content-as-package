<?php

namespace MbcApiContent\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MbcApiContent\Http\Resources\PageContentResource;
use MbcApiContent\Models\PageContent;
use MbcApiContent\Validators\ValidationRules;

class PageContentController extends Controller
{

    public function index(Request $request)
    {
        return PageContentResource::collection(PageContent::all());
    }

    public function store(Request $request)
    {
//        $validated = $this->validate($request, ValidationRules::PAGE_CONTENT_RULES);

        $pageContent = PageContent::create([
            "name"    => $request->post('name') ?? '',
            "content" => $request->post('content') ?? '',
            "page_id" => $request->post('page_id') ?? null,
        ]);

        return new PageContentResource($pageContent);
    }



    public function search(Request $request)
    {
        $column = $request->query->get('column');
        $column_value = $request->query->get('column_value');
        $relations = $request->query->get('relations') ?? null;

        if (!is_null($relations)) {
            $pageContent = PageContent::where($column, $column_value)->get()->loadMissing(['pageContents', 'route']);
        } else {
            $pageContent = PageContent::where($column, $column_value)->get();
        }

        $pageContentResource = PageContentResource::collection($pageContent);

        $pageContentResource->collection->each(function($res)
        {
            $res->load();
        });
        return $pageContentResource;
    }


    public function show(Request $request, PageContent $pageContent)
    {
        $relations = $request->query->get('relations') ?? null;

        if (!is_null($relations)) {
            $pageContent = $pageContent->loadMissing(['page']);
        }

        return new PageContentResource($pageContent);
    }

    public function update(Request $request, PageContent $pageContent)
    {
        //        $validated = $this->validate($request, str_replace('required|', '', ValidationRules::PAGE_CONTENT_RULES));

        $pageContent->update($request->only(
            [
                'name',
                'content',
                'page_id',
            ]
        ));

        return new PageContentResource($pageContent);
    }


    public function destroy(PageContent $pageContent)
    {
        $pageContent->delete();

        return response()->json(null, 204);
    }
}
