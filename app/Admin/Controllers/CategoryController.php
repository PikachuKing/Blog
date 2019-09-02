<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CategoryController extends AdminController
{
    /**
     * 标签管理列表页
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('分类')
            ->description('列表')
            ->body($this->grid());
    }

    /**
     * 添加页
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('添加分类')
            ->body($this->form());
    }

    /**
     * 编辑页
     * @param $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('修改分类')
            ->body($this->form()->edit($id));
    }

    /**
     * 详情页
     * @param $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('分类详情')
            ->body($this->detail($id));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category);

        $grid->column('name', '分类名称');
        $grid->column('article_num', '分类文章数')->sortable();
        $grid->column('search_num', '分类热度')->sortable();
        $grid->column('created_at', '创建时间');
        $grid->column('updated_at', '更新时间');
        $grid->disableExport();

        // 添加标签名称过滤
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 添加标签名称字段过滤器
            $filter->like('name', '分类名称');
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
        $show = new Show(Category::findOrFail($id));

        $show->field('name', '分类名称');
        $show->field('article_num', '分类文章数');
        $show->field('search_num', '分类热度');
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
        $form = new Form(new Category);

        $form->text('name', '分类名称')->rules('required|max: 255');

        return $form;
    }
}
