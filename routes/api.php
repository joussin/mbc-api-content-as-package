<?php


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

// API






    Route::get('/route', ['uses' => '\MbcApiContent\Http\Controllers\Api\ApiController@getAllRoute'])
        ;
    Route::get('/route/{id}', ['uses' => '\MbcApiContent\Http\Controllers\Api\ApiController@getRoute'])
        ;
    Route::put('/route/{id}', ['uses' => '\MbcApiContent\Http\Controllers\Api\ApiController@updateRoute'])
        ;

    Route::post('/route', ['uses' => '\MbcApiContent\Http\Controllers\Api\ApiController@postRoute'])
        ;


    Route::get('/page', ['uses' => '\MbcApiContent\Http\Controllers\Api\ApiController@getAllPage'])
        ;
    Route::get('/page/{id}', ['uses' => '\MbcApiContent\Http\Controllers\Api\ApiController@getPage'])
        ;
     Route::put('/page/{id}', ['uses' => '\MbcApiContent\Http\Controllers\Api\ApiController@updatePage'])
        ;

    Route::post('/page', ['uses' => '\MbcApiContent\Http\Controllers\Api\ApiController@postPage'])
        ;



Route::get('/resource/route/{id}', function ($id) {
    return new \MbcApiContent\Http\Resources\RouteResource(\Illuminate\Support\Facades\Route::findOrFail($id));
});

Route::get('/resource/routes', function () {
    return \MbcApiContent\Http\Resources\RouteCollection::collection(\Illuminate\Support\Facades\Route::all());
});
