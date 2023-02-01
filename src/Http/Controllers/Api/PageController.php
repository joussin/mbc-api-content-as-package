<?php

namespace MbcApiContent\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MbcApiContent\Http\Resources\PageResource;
use MbcApiContent\Models\Page;
use MbcApiContent\Validators\ValidationRules;

class PageController extends Controller
{

    public function index(Request $request)
    {
        return PageResource::collection(Page::all());
    }


    public function store(Request $request)
    {
//        $validated = $this->validate($request, ValidationRules::PAGE_RULES);

        $page = Page::create([
            "version"       => $request->post('version') ?? 1,
            "name"          => $request->post('name'),
            "template_name" => $request->post('template_name'),
            "route_id"      => $request->post('route_id') ?? null,
        ]);

        return new PageResource($page);
    }

    public function search(Request $request)
    {
        $column = $request->query->get('column');
        $column_value = $request->query->get('column_value');
        $relations = $request->query->get('relations') ?? null;

        if (!is_null($relations)) {
            $page = Page::where($column, $column_value)->get()->loadMissing(['pageContents', 'route']);
        } else {
            $page = Page::where($column, $column_value)->get();
        }

        $pageResource = PageResource::collection($page);

        $pageResource->collection->each(function($res)
        {
            $res->load();
        });
        return $pageResource;
    }


    public function show(Request $request, Page $page)
    {
        $relations = $request->query->get('relations') ?? null;

        if (!is_null($relations)) {
            $page = $page->loadMissing(['pageContents', 'route']);
        }
        return new PageResource($page);
    }


    public function update(Request $request, Page $page)
    {
        //        $validated = $this->validate($request, str_replace('required|', '', ValidationRules::PAGE_RULES));
        $page->update($request->only(
            [
                "version",
                "name",
                "template_name",
                "route_id"
            ]
        ));

        return new PageResource($page);
    }


    public function destroy(Page $page)
    {
        $page->delete();

        return response()->json(null, 204);
    }
}
