<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article);
        $grid->column('user_id')->display(function() {
            return Admin::user()->name;
        });
        $grid->column('category_id')->display(function($categoryId) {
            return Category::find($categoryId)->name;
        });
        $grid->column('title', '标题');
        $grid->column('slug', 'slug');
        $grid->column('is_draft', '草稿');
        $grid->column('view_number', '阅读数')->sortable();
        $grid->column('published_at','发布时间')->sortable();
        $grid->disableExport();
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
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('category_id', __('Category id'));
        $show->field('title', '标题');
        $show->field('slug', __('Slug'));
        $show->field('description', '摘要');
        $show->field('content', '内容');
        $show->field('is_draft', '草稿');
        $show->field('view_number', '阅读数');
        $show->field('published_at', '发布时间');
        $show->field('created_at', '创建时间');
        $show->field('updated_at', '更新时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article);

        $form->number('user_id', __('User id'));
        $form->number('category_id', __('Category id'));
        $form->text('title', __('Title'));
        $form->text('slug', __('Slug'));
        $form->text('description', __('Description'));
        $form->simplemde('content');

        $form->switch('is_draft', __('Is draft'));
        $form->number('view_number', __('View number'));
        $form->datetime('published_at', __('Published at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
