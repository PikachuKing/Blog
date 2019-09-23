<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'namespace' => 'API', 'middleware' => 'throttle'], function(){
    Route::get('/articles/{page}', 'ArticleController@getArticles')->where('page', '[0-9]+');

    Route::get('/tags', 'TagController@getTags');
    Route::get('/tags/{name}/{page}', 'TagController@getTagCatalogs')->where('page', '[0-9]+');

    Route::get('/categories', 'CategoryController@getCategories');

    Route::get('/archives/{page}', 'ArchiveController@getArchives')->where('page', '[0-9]+');
});
