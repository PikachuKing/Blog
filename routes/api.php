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
    // 标签
    Route::get('/tags', 'TagController@getTags');
    Route::get('/tags/{name}/{currentPage}', 'TagController@getTagCatalogs')->where('page', '[0-9]+');

    // 分类
    Route::get('/categories', 'CategoryController@getCategories');
    Route::get('/categories/{name}/{currentPage}', 'CategoryController@getCategoryCatalogs')->where('page', '[0-9]+');

    // 归档
    Route::get('/archives/{currentPage}', 'ArchiveController@getArchives')->where('page', '[0-9]+');

    // 文章列表
    Route::get('/articles/{currentPage}', 'ArticleController@getArticles')->where('page', '[0-9]+');
    Route::get('/{slug}', 'ArticleController@getArticle');
});
