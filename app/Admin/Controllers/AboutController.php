<?php

namespace App\Admin\Controllers;

use App\Models\About;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class AboutController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\About';

    /**
     * 关于列表页
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('关于我')
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
        $form = $this->_form();
        $form->editormd('content', '内容')->default($form->model()->content['raw']);
        return $content
            ->header('添加关于我')
            ->body($form);
    }

    /**
     * 编辑页
     * @param $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        $form = $this->_form()->edit($id);
        $form->editormd('content', '内容')->default($form->model()->content['raw']);
        return $content
            ->header('修改关于我')
            ->body($form);
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
            ->header('关于我详情')
            ->body($this->detail($id));
    }


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new About);
        $grid->column('id', 'ID');
        $grid->column('show', '展示')->bool()->sortable();
        $grid->column('content', '内容')->display(function ($content) {
            return mb_substr($content['raw'], 0, 100);
        });
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
        $show = new Show(About::findOrFail($id));
        $show->field('show', '展示')->as(function ($is_draft) {
            return $is_draft ? '是' : '否';
        });
        $show->field('content', '内容')->as(function ($content) {
            return $content['html'];
        })->json();

        return $show;
    }

    protected function _form()
    {
        $form = new Form(new About);
        $form->switch('show', '展示');
        return $form;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new About);
        $form->switch('show', '展示');
        $form->editormd('content', '内容')->rules('required');;
        return $form;
    }
}
