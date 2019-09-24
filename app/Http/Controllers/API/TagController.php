<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/21 0021
 * Time: 下午 23:38
 */

namespace App\Http\Controllers\API;


use App\Models\Article;
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
     | URL:            /api/v1/tags/{name}/{currentPage}
     | Method:         GET
     | Description:    获取当前标签下的所有文章
     |-------------------------------------------------------------------------------
    */
    public function getTagCatalogs(string $name, int $currentPage = 1)
    {
        $tagCatalogs[$name] = Article::query()
            ->where('is_draft', 0)
            ->select('title as name', 'slug', 'published_at')
            ->selectRaw('DATE_FORMAT(published_at,"%Y") as year')
            ->selectRaw('DATE_FORMAT(published_at,"%m-%d") as time')
            ->whereHas('tags', function ($query) use ($name) {
                $query->where('name', $name);
            })
            ->orderBy('published_at', 'DESC')
            ->offset($this->pageSize() * ($currentPage - 1))
            ->limit($this->pageSize())
            ->get()
            ->makeHidden('published_at');

        // 计算总页数
        $lastPage = ceil(Article::query()
                ->whereNotNull('published_at')
                ->whereHas('tags', function ($query) use ($name) {
                    $query->where('name', $name);
                })
                ->count() / $this->pageSize());
        return $this->success(compact('tagCatalogs', 'currentPage', 'lastPage'));
    }
}
