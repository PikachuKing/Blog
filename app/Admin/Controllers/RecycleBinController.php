<?php
/**
 *  recycle bin
 */
namespace App\Admin\Controllers;

use App\Admin\Actions\Article\ForceDelete;
use App\Admin\Actions\Article\Restore;
use App\Models\Article;
use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class RecycleBinController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Article';

    /**
     * recycle bin lists
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('回收站文章')
            ->description('列表')
            ->body($this->grid());
    }

    /**
     *  recycle bin detail
     * @param $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('回收站文章详情')
            ->body($this->detail($id));
    }


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article);
        $grid->model()->onlyTrashed();

        $grid->column('user_id', '用户')->display(function () {
            return Admin::user()->name;
        });
        $grid->column('title', '标题');
        $grid->column('slug', 'slug');
        $grid->column('category_id', '分类')->display(function ($categoryId) {
            return Category::find($categoryId)->name;
        });
        $grid->column('tags', '标签')->display(function ($tags) {
            $tags = array_column($tags, 'name');
            return implode(', ', $tags);
        });
        $grid->column('view_number', '阅读数')->sortable();
        $grid->column('published_at', '发布时间')->sortable();
        $grid->disableExport();
        $grid->disableCreateButton();
        // 添加文章标题过滤
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 添加文章标题字段过滤器
            $filter->like('title', '文章标题');
        });
        $grid->actions(function ($actions) {
            // 去掉编辑
            $actions->disableEdit();
            // 去掉删除
            $actions->disableDelete();
            // 恢复
            $actions->add(new Restore);
            // 永久删除
            $actions->add(new ForceDelete);
        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Article::withTrashed()->findOrFail($id));
        $show->field('id', __('Id'));
        $show->user('创建人')->as(function ($user) {
            return $user->name;
        });
        $show->field('title', '标题');
        $show->field('slug', __('Slug'));
        $show->category('分类')->as(function ($category) {
            return $category->name;
        });
        $show->tags('标签')->as(function ($tags) {
            $tags = array_column($tags->toArray(), 'name');
            return implode(', ', $tags);
        });
        $show->field('description', '摘要')->as(function ($description) {
            return $description['html'];
        })->json();
        $show->field('content', '内容')->as(function ($content) {
            return $content['html'];
        })->json();
        $show->field('is_draft', '草稿');
        $show->field('view_number', '阅读数');
        $show->field('published_at', '发布时间');
        $show->field('created_at', '创建时间');
        $show->field('updated_at', '更新时间');

        return $show;
    }
}
