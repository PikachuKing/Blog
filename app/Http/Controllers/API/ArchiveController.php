<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/22 0022
 * Time: 下午 22:13
 */

namespace App\Http\Controllers\API;


use App\Models\Article;

class ArchiveController extends APIController
{
    /*
     |-------------------------------------------------------------------------------
     | 获取归档列表
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/archives
     | Method:         GET
     | Description:    Gets archives list by years in the application
    */
    public function getArchives()
    {
        $categories = Article::query()
            ->orderBy('published_at', 'DESC')
            ->select('title', 'slug', 'published_at')
            ->paginate(10);
        return $this->success($categories);
    }
}
