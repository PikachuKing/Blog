<?php

namespace App\Admin\Controllers;

use App\Models\Link;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LinkController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Link';

    /**
     * 友链管理列表页
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('友链')
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
            ->header('添加友链')
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
            ->header('友链分类')
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
            ->header('友链详情')
            ->body($this->detail($id));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Link);

        $grid->column('name', '名称');
        $grid->column('link', '链接');
        $grid->column('image', '图片');
        $grid->column('status', '状态');
        $grid->column('created_at', '创建时间');

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
        $show = new Show(Link::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('link', __('Link'));
        $show->field('image', __('Image'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Link);

        $form->text('name', __('Name'));
        $form->url('link', __('Link'));
        $form->textarea('image', __('Image'));
        $form->switch('status', __('Status'))->default(1);

        return $form;
    }
}
