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

// API






    Route::get('/route', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@getAllRoute'])
        ;
    Route::get('/route/{id}', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@getRoute'])
        ;
    Route::put('/route/{id}', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@updateRoute'])
        ;

    Route::post('/route', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@postRoute'])
        ;


    Route::get('/page', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@getAllPage'])
        ;
    Route::get('/page/{id}', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@getPage'])
        ;
     Route::put('/page/{id}', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@updatePage'])
        ;

    Route::post('/page', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@postPage'])
        ;



    Route::get('/template', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@getAllTemplate'])
        ;
    Route::get('/template/{id}', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@getTemplate'])
        ;
     Route::put('/template/{id}', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@updateTemplate'])
        ;

    Route::post('/template', ['uses' => '\MainNamespace\App\Http\Controllers\Api\ApiController@postTemplate'])
        ;





