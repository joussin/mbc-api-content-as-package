<?php

namespace MbcApiContent\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MbcApiContent\Http\Resources\PageResource;
use MbcApiContent\Models\Page;
use MbcApiContent\Validators\ValidationRules;

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

        if ($page && count($page) > 1) {
            return PageResource::collection($page);
        } elseif ($page && count($page) == 1) {
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
