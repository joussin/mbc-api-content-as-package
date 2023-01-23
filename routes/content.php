<?php


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// $url - $staticDocName - $staticUrl
// via middleware : UrlMiddleware
// http://127.0.0.1:8000/url/carte-grise/cgm



//
//
//// BackofficeController
Route::get('/', ['uses' => '\MainNamespace\App\Http\Controllers\Backoffice\BackofficeController@index']);
Route::get('/backoffice', ['uses' => '\MainNamespace\App\Http\Controllers\Backoffice\BackofficeController@index']);
Route::get('/backoffice/wysiwyg', ['uses' => '\MainNamespace\App\Http\Controllers\Backoffice\BackofficeController@wysiwyg']);
Route::get('/backoffice/wysiwyg/inline', ['uses' => '\MainNamespace\App\Http\Controllers\Backoffice\BackofficeController@wysiwygInline']);

Route::get('/backoffice/wysiwyg/edit/{templateId}', ['uses' => '\MainNamespace\App\Http\Controllers\Backoffice\BackofficeController@wysiwygEdit']);
Route::get('/backoffice/wysiwyg/inline/edit/{templateId}', ['uses' => '\MainNamespace\App\Http\Controllers\Backoffice\BackofficeController@wysiwygInlineEdit']);

Route::get('/backoffice/wysiwyg/editor_example', ['uses' => '\MainNamespace\App\Http\Controllers\Backoffice\BackofficeController@editorExample']);





// API



Route::group(['prefix' => 'api'], function () {


    Route::get('/route', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@getAllRoute'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
    Route::get('/route/{id}', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@getRoute'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
    Route::put('/route/{id}', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@updateRoute'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

    Route::post('/route', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@postRoute'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);


    Route::get('/page', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@getAllPage'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
    Route::get('/page/{id}', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@getPage'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
     Route::put('/page/{id}', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@updatePage'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

    Route::post('/page', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@postPage'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);



    Route::get('/template', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@getAllTemplate'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
    Route::get('/template/{id}', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@getTemplate'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
     Route::put('/template/{id}', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@updateTemplate'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

    Route::post('/template', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@postTemplate'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

});




