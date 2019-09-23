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
     | URL:            /api/v1/tags
     | Method:         GET
     | Description:    获取所有标签
     |-------------------------------------------------------------------------------
    */
    public function getTags()
    {
        $tags = Tag::query()
            ->select('id', 'name')
            ->withCount('articles as count')
            ->get();
        return $this->success($tags);
    }

    /*
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/tag/{name}/{page}
     | Method:         GET
     | Description:    获取当前标签下的所有文章
     |-------------------------------------------------------------------------------
    */
    public function getTagCatalogs($name, $page)
    {

    }
}
