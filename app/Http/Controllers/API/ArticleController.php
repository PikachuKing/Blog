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
    public function getArticles($page = 1)
    {
        $articles = Article::query()
            ->whereNotNull('published_at')
            ->with('category:id,name', 'tags:name')
            ->orderBy('published_at', 'DESC')
            ->paginate($this->pageSize(), ['description', 'slug', 'title', 'published_at', 'view_number', 'id', 'category_id'], 'articles', $page);

        $articles->data = $articles->makeHidden(['id', 'category_id']);

        return $this->success($articles);
    }

    /*
     |-------------------------------------------------------------------------------
     | 获取文章详情
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/article/{id}
     | Method:         GET
     | Description:    Gets an individual article
     | Parameters:
     |   $id   -> ID of the article we are retrieving
    */
    public function getArticle($id)
    {

    }
}
