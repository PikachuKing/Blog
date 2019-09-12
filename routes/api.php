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
    Route::get('/', 'ArticleController@getArticles');
    Route::get('/page/{page}', 'ArticleController@getArticles')->where('page', '[0-9]+');
});
