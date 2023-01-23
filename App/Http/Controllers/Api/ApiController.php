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


    public function postPage(Request $request)
    {
        Log::info("-----------postPage----------------");
        Log::info(json_encode([
            $request->all()
        ]));


        $validated = $this->validate($request, ValidationRules::PAGE_RULES);

        $validated['template_input_data'] = ($request->post('template_input_data')) ? json_encode($request->post('template_input_data')) : null;


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


        if ($request->post('template_input_data'))
            $validated['template_input_data'] = json_encode($request->post('template_input_data'));


        $result = $this->apiService->updatePage($id, $validated);

        return response()->json($result, 200);
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


    public function postTemplate(Request $request)
    {

        Log::info("------------postTemplate---------------");
        Log::info(json_encode([
            $request->all()
        ]));


        $validated = $this->validate($request, ValidationRules::TEMPLATE_RULES);

        $validated['template_data'] = ($request->post('template_data')) ? json_encode($request->post('template_data')) : null;


        $result = $this->apiService->postTemplate($validated);

        return response()->json($result, 200);
    }


    public function getAllTemplate(Request $request)
    {

        $result = $this->apiService->getAllTemplate();

        return response()->json($result, 200);
    }


    public function getTemplate(Request $request, $id)
    {
        $result = $this->apiService->getTemplate($id);

        return response()->json($result, 200);
    }

    public function updateTemplate(Request $request, $id)
    {
        Log::info("------------updateTemplate---------------");
        Log::info(json_encode([
            $request->all()
        ]));


        $validated = $this->validate($request, str_replace('required|', '', ValidationRules::TEMPLATE_RULES));

        if ($request->post('template_data'))
            $validated['template_data'] = json_encode($request->post('template_data'));


        $result = $this->apiService->updateTemplate($id, $validated);

        return response()->json($result, 200);
    }


}
