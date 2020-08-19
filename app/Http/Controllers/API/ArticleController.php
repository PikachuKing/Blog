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
    |-------------------------------------------------------------------------------
   */
    public function getArticles(int $currentPage = 1)
    {
        $articles = Article::query()
            ->where('is_draft', 0)
            ->with('category:id,name', 'tags:name')
            ->orderBy('published_at', 'DESC')
            ->paginate($this->pageSize(), ['description', 'slug', 'title', 'published_at', 'view_number', 'id', 'category_id'], 'articles', $currentPage);

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
            ->with('category:id,name', 'tags:name')
            ->select('slug', 'published_at', 'title','content', 'view_number' , 'category_id')
            ->firstWhere(['slug' => $slug, 'is_draft' => 0]);
        if (!$article) {
            return $this->fail(1000);
        }
        //隐藏content
        $article->makeHidden('content');
        $article['content_html'] = $article['content']['html'];
        // 阅读数自增
        $article->increment('view_number');
        $prevArticle = Article::query()
            ->where('is_draft', 0)
            ->where('published_at', '>', $article->published_at)
            ->orderBy('published_at', 'ASC')
            ->first(['slug', 'title']);
        $nextArticle = Article::query()
            ->where('is_draft', 0)
            ->where('published_at', '<', $article->published_at)
            ->orderBy('published_at', 'DESC')
            ->first(['slug', 'title']);

        return $this->success(compact('article', 'prevArticle', 'nextArticle'));
    }
}
