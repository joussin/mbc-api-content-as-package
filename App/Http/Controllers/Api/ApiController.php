<?php

namespace MbcApiContent\App\Http\Controllers\Api;


use MbcApiContent\App\Entity\Validators\ValidationRules;
use MbcApiContent\App\Services\ApiService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{


    protected ApiService $apiService;


    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }



    public function postRoute(Request $request)
    {
        Log::info("-----------postRoute----------------");
        Log::info(json_encode([
            $request->all()
        ]));

        $validated = $this->validate($request, ValidationRules::ROUTE_RULES);

        $validated['path_parameters'] = ($request->post('path_parameters')) ? json_encode($request->post('path_parameters')) : null;
        $validated['query_parameters'] = ($request->post('query_parameters')) ? json_encode($request->post('query_parameters')) : null;


        $result = $this->apiService->postRoute($validated);

        return response()->json($result, 200);
    }


    public function getAllRoute(Request $request)
    {

        $result = $this->apiService->getAllRoute();

        return response()->json($result, 200);
    }


    public function getRoute(Request $request, $id)
    {
        $result = $this->apiService->getRoute($id);

        return response()->json($result, 200);
    }

    public function updateRoute(Request $request, $id)
    {
        Log::info("-----------updateRoute----------------");
        Log::info(json_encode([
            $request->all()
        ]));


        $validated = $this->validate($request, str_replace('required|', '', ValidationRules::ROUTE_RULES));

        if ($request->post('path_parameters'))
            $validated['path_parameters'] = json_encode($request->post('path_parameters'));

        if ($request->post('query_parameters'))
            $validated['query_parameters'] = json_encode($request->post('query_parameters'));


        $result = $this->apiService->updateRoute($id, $validated);

        return response()->json($result, 200);
    }






    public function postPage(Request $request)
    {
        Log::info("-----------postPage----------------");
        Log::info(json_encode([
            $request->all()
        ]));


        $validated = $this->validate($request, ValidationRules::PAGE_RULES);



        $result = $this->apiService->postPage($validated);

        return response()->json($result, 200);
    }


    public function getAllPage(Request $request)
    {

        $result = $this->apiService->getAllPage();

        return response()->json($result, 200);
    }


    public function getPage(Request $request, $id)
    {
        $result = $this->apiService->getPage($id);

        return response()->json($result, 200);
    }


    public function updatePage(Request $request, $id)
    {
        Log::info("-----------updatePage----------------");
        Log::info(json_encode([
            $request->all()
        ]));


        $validated = $this->validate($request, str_replace('required|', '', ValidationRules::PAGE_RULES));


        $result = $this->apiService->updatePage($id, $validated);

        return response()->json($result, 200);
    }

}
