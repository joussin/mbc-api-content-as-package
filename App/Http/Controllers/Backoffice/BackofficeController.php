<?php

namespace MbcApiContent\App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use MbcApiContent\App\Facades\RouterFacade;
use MbcApiContent\App\Services\ApiService;
use App\Http\Controllers\Controller;

class BackofficeController extends Controller
{

    protected $apiService;


    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        return view('api_content_views::backoffice.index');;
    }


    public function editorExample()
    {

        return view('api_content_views::backoffice.editor_example');
    }

    public function wysiwyg()
    {

        $pages = $this->apiService->getAllPage();

        return view('api_content_views::backoffice.wysiwyg', [
            'pages' => $pages
        ]);
    }




    //--------------------
    //--------------------
    //--------------------
    //--------------------

    public function wysiwygInline()
    {

        return view('api_content_views::backoffice.wysiwyg_inline');
    }



    public function wysiwygInlineEdit()
    {

        return view('api_content_views::backoffice.wysiwyg_inline');
    }



    public function wysiwygEdit()
    {

        return view('api_content_views::backoffice.wysiwyg');
    }



}
