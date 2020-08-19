<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/21 0021
 * Time: 下午 23:38
 */

namespace App\Http\Controllers\API;


use App\Models\Article;
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

    /*
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/tags/{name}/{currentPage}
     | Method:         GET
     | Description:    获取当前分类下的所有文章
     |-------------------------------------------------------------------------------
    */
    public function getCategoryCatalogs(string $name, int $currentPage = 1)
    {
        //获取分类Id
        $category = Category::query()->where('name', $name)->firstOrFail(['id']);
        $categoryCatalogs[$name] = Article::query()
            ->where('is_draft', 0)
            ->where('category_id', $category->id)
            ->select('title as name', 'slug', 'published_at')
            ->selectRaw('DATE_FORMAT(published_at,"%Y-%m-%d") as time')
            ->orderBy('published_at', 'DESC')
            ->offset($this->pageSize() * ($currentPage - 1))
            ->limit($this->pageSize())
            ->get()
            ->makeHidden('published_at');

        // 计算总页数
        $lastPage = ceil(Article::query()
                ->whereNotNull('published_at')
                ->whereHas('category', function ($query) use ($name) {
                    $query->where('name', $name);
                })
                ->count() / $this->pageSize());
        return $this->success(compact('categoryCatalogs', 'currentPage', 'lastPage'));
    }
}
