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

Route::get('route/search', [\MbcApiContent\Http\Controllers\Api\RouteController::class, 'search']);
Route::get('route/{route}/relations', [\MbcApiContent\Http\Controllers\Api\RouteController::class, 'showWithRelations']);
Route::get('route/relations', [\MbcApiContent\Http\Controllers\Api\RouteController::class, 'indexWithRelations']);

Route::get('page/{page}/relations', [\MbcApiContent\Http\Controllers\Api\PageController::class, 'showWithRelations']);
Route::get('page/relations', [\MbcApiContent\Http\Controllers\Api\PageController::class, 'indexWithRelations']);
Route::get('page/search', [\MbcApiContent\Http\Controllers\Api\PageController::class, 'search']);

Route::get('page-content/{page_content}/relations', [\MbcApiContent\Http\Controllers\Api\PageContentController::class, 'showWithRelations']);
Route::get('page-content/relations', [\MbcApiContent\Http\Controllers\Api\PageContentController::class, 'indexWithRelations']);
Route::get('page-content/search', [\MbcApiContent\Http\Controllers\Api\PageContentController::class, 'search']);


Route::apiResource('route', \MbcApiContent\Http\Controllers\Api\RouteController::class);
Route::apiResource('page', \MbcApiContent\Http\Controllers\Api\PageController::class);
Route::apiResource('page-content', \MbcApiContent\Http\Controllers\Api\PageContentController::class);
