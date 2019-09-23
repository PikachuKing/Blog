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
    public function getArchives(int $currentPage = 1)
    {
        $articles = Article::query()
            ->whereNotNull('published_at')
            ->select('title as name', 'slug', 'published_at')
            ->selectRaw('DATE_FORMAT(published_at,"%Y") as year')
            ->selectRaw('DATE_FORMAT(published_at,"%m%d") as time')
            ->orderBy('published_at', 'DESC')
            ->offset($this->pageSize() * ($currentPage - 1))
            ->limit($this->pageSize())
            ->get()
            ->makeHidden('published_at')
            ->groupBy('year');

        // 计算总页数
        $lastPage = ceil(Article::query()->whereNotNull('published_at')->count() / $this->pageSize());
        return $this->success(compact('articles', 'currentPage', 'lastPage'));
    }


}
