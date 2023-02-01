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

Route::get('route/{route}/full', [\MbcApiContent\Http\Controllers\Api\RouteController::class, 'showComplete']);
Route::get('route/full', [\MbcApiContent\Http\Controllers\Api\RouteController::class, 'indexComplete']);

Route::get('page/{page}/full', [\MbcApiContent\Http\Controllers\Api\PageController::class, 'showComplete']);
Route::get('page/full', [\MbcApiContent\Http\Controllers\Api\PageController::class, 'indexComplete']);

Route::get('page-content/{page-content}/full', [\MbcApiContent\Http\Controllers\Api\PageContentController::class, 'showComplete']);
Route::get('page-content/full', [\MbcApiContent\Http\Controllers\Api\PageContentController::class, 'indexComplete']);


Route::apiResource('route', \MbcApiContent\Http\Controllers\Api\RouteController::class);
Route::apiResource('page', \MbcApiContent\Http\Controllers\Api\PageController::class, ['showComplete']);
Route::apiResource('page-content', \MbcApiContent\Http\Controllers\Api\PageContentController::class);
