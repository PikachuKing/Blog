<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/12
 * Time: 11:02
 */

namespace App\Http\Controllers\API;


use App\Models\Article;

class ArticleController extends APIController
{
    /*
    |-------------------------------------------------------------------------------
    | 获取所有文章
    |-------------------------------------------------------------------------------
    | URL:            /api/v1/articles
    | Method:         GET
    | Description:    Gets all of the articles in the application
    | Parameters:
    |   $page   -> page of the article we are retrieving
   */
    public function getArticles(int $currentPage = 1)
    {
        $articles = Article::query()
            ->where('is_draft', 0)
            ->with('category:id,name', 'tags:name')
            ->orderBy('published_at', 'DESC')
            ->select('description', 'slug', 'title', 'published_at', 'view_number', 'id', 'category_id')
            ->selectRaw('DATE_FORMAT(published_at,"%Y-%m-%d") as time')
            ->paginate($this->pageSize(), ['*'], 'articles', $currentPage);

        $articles->data = $articles->makeHidden(['id', 'category_id']);

        return $this->success($articles);
    }

    /*
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/article/{slug}
     | Method:         GET
     | Description:    获取文章详情
     | Parameters:
     |   $slug   -> slug of the article we are retrieving
     |-------------------------------------------------------------------------------
    */
    public function getArticle($slug)
    {
        $article = Article::query()
            ->where('is_draft', 0)
            ->select('slug', 'published_at', 'title', 'content', 'id', 'view_number' , 'category_id')
            ->selectRaw('DATE_FORMAT(published_at,"%Y-%m-%d") as time')
            ->where('slug', $slug)
            ->with('category:id,name', 'tags:name')
            ->first();
        if (!$article) {
            return $this->fail(1000);
        }
        // 阅读数自增
        $article->increment('view_number');
        $prevArticle = Article::query()
            ->where('is_draft', 0)
            ->where('id', '>', $article->id)
            ->orderBy('id', 'ASC')
            ->select('slug', 'title')
            ->first();
        $nextArticle = Article::query()
            ->where('is_draft', 0)
            ->where('id', '<', $article->id)
            ->orderBy('id', 'DESC')
            ->select('slug', 'title')
            ->first();

        return $this->success(compact('article', 'prevArticle', 'nextArticle'));
    }
}
