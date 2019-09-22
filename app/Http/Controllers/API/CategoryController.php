<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/21 0021
 * Time: 下午 23:38
 */

namespace App\Http\Controllers\API;


use App\Models\Category;

class CategoryController extends APIController
{
    /*
     |-------------------------------------------------------------------------------
     | 获取所有分类
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/categories
     | Method:         GET
     | Description:    Gets all of the categories in the application
    */
    public function getCategories()
    {
        $categories = Category::query()
            ->select('id', 'name')
            ->withCount('articles as count')
            ->get();
        return $this->success($categories);
    }
}
