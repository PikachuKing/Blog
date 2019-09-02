<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    // 标签
    $router->resource('tags', 'TagController');
    // 分类
    $router->resource('categories', 'CategoryController');
    // 文章
    $router->resource('articles', 'ArticleController');
    // 回收站
    $router->resource('recycle_bin', 'RecycleBinController');
    // 关于
    $router->resource('abouts', 'AboutController');
    // 友链
    $router->resource('links', 'LinkController');

});
Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
], function (Router $router) {
    // 文章图片上传
    $router->post('article_images', 'ArticleController@articleImages');
});
