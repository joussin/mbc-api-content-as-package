<?php




Route::get('/resource/route/{id}', function ($id) {
    return new \MbcApiContent\Http\Resources\RouteResource(\MbcApiContent\Models\Route::findOrFail($id));
});

Route::get('/resource/routes', function () {
    return \MbcApiContent\Http\Resources\RouteCollection::collection(\MbcApiContent\Models\Route::all());
});






Route::get('/resource/page/{id}', function ($id) {
    return new \MbcApiContent\Http\Resources\PageResource(\MbcApiContent\Models\Page::findOrFail($id));
});

Route::get('/resource/pages', function () {
    return \MbcApiContent\Http\Resources\PageCollection::collection(\MbcApiContent\Models\Page::all());
});






Route::get('/resource/page-content/{id}', function ($id) {
    return new \MbcApiContent\Http\Resources\PageContentResource(\MbcApiContent\Models\PageContent::findOrFail($id));
});

Route::get('/resource/page-contents', function () {
    return \MbcApiContent\Http\Resources\PageContentCollection::collection(\MbcApiContent\Models\PageContent::all());
});
