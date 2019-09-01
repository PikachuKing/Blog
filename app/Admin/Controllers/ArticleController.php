<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
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
     * 文章管理列表页
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('文章')
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
        $form->simplemde('description', '摘要');
        $form->editormd('content', '内容');
        return $content
            ->header('添加文章')
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
        $form->simplemde('description', '摘要')->default($form->model()->description['raw']);
        $form->editormd('content', '内容')->default($form->model()->content['raw']);
        return $content
            ->header('修改文章')
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
            ->header('文章详情')
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
        $grid->column('is_draft', '草稿')->switch()->sortable();
        $grid->column('view_number', '阅读数')->sortable();
        $grid->column('published_at', '发布时间')->sortable();
        $grid->disableExport();
        // 添加文章标题过滤
        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 添加文章标题字段过滤器
            $filter->like('title', '文章标题');
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
        $show = new Show(Article::findOrFail($id));
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
        $show->field('is_draft', '草稿')->as(function ($is_draft) {
            return $is_draft ? '是' : '否';
        });
        $show->field('view_number', '阅读数');
        $show->field('published_at', '发布时间');
        $show->field('created_at', '创建时间');
        $show->field('updated_at', '更新时间');

        return $show;
    }

    protected function _form()
    {
        $form = new Form(new Article);
        $form->hidden('user_id')->value(Admin::user()->id);
        $form->hidden('slug')->value(Admin::user()->id);
        $form->text('title', '标题');
        $form->select('category_id', '分类')->options(function () {
            $categories = Category::all();
            $options = [];
            if ($categories->count()) {
                foreach ($categories as $category) {
                    $options[$category['id']] = $category['name'];
                }
            }
            return $options;
        });
        $form->multipleSelect('tags', '标签')->options(Tag::all()->pluck('name', 'id'));
        $form->switch('is_draft', '草稿');
        return $form;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article);
        $form->hidden('user_id');
        $form->hidden('slug');
        $form->text('title', '标题');
        $form->select('category_id', '分类');
        $form->multipleSelect('tags', '标签');
        $form->switch('is_draft', '草稿');
        $form->simplemde('description', '摘要');
        $form->editormd('content', '内容');
        return $form;
    }
}
