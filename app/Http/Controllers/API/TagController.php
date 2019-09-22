<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/21 0021
 * Time: 下午 23:38
 */

namespace App\Http\Controllers\API;


use App\Models\Tag;

class TagController extends APIController
{
    /*
     |-------------------------------------------------------------------------------
     | 获取所有标签
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/tags
     | Method:         GET
     | Description:    Gets all of the tags in the application
    */
    public function getTags()
    {
        $tags = Tag::query()
            ->select('id', 'name')
            ->withCount('articles as count')
            ->get();
        return $this->success($tags);
    }
}
