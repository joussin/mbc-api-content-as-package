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




//// BackofficeController
Route::get('/', ['uses' => '\MbcApiContent\Http\Controllers\Backoffice\BackofficeController@index']);
Route::get('/wysiwyg', ['uses' => '\MbcApiContent\Http\Controllers\Backoffice\BackofficeController@wysiwyg']);
Route::get('/wysiwyg/inline', ['uses' => '\MbcApiContent\Http\Controllers\Backoffice\BackofficeController@wysiwygInline']);

Route::get('/wysiwyg/edit/{templateId}', ['uses' => '\MbcApiContent\Http\Controllers\Backoffice\BackofficeController@wysiwygEdit']);
Route::get('/wysiwyg/inline/edit/{templateId}', ['uses' => '\MbcApiContent\Http\Controllers\Backoffice\BackofficeController@wysiwygInlineEdit']);

Route::get('/wysiwyg/editor_example', ['uses' => '\MbcApiContent\Http\Controllers\Backoffice\BackofficeController@editorExample']);





