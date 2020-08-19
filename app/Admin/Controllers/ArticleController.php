<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Article\ForceDelete;
use App\Admin\Actions\Article\Restore;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文章管理';

    /**
     * 编辑页
     * @param $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        $form = $this->form()->edit($id);
        $form->simplemde('description', '摘要')->default($form->model()->description['raw']);
        $form->editormd('content', '内容')->default($form->model()->content['raw']);
        return $content
            ->header('修改文章')
            ->body($form);
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article);
        $grid->column('id', 'ID');
        $grid->column('title', '标题');
        $grid->column('slug', 'slug');
        $grid->column('category.name', '分类');
        $grid->column('tags', '标签')->pluck('name')->label();;
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
        })->unescape();
        $show->field('content', '内容')->as(function ($content) {
            return $content['html'];
        })->unescape();
        $show->field('is_draft', '草稿')->using(['1' => '是', '0' => '否']);
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
        $form->hidden('user_id')->value(Admin::user()->id);
        $form->hidden('slug');
        $form->text('title', '标题')->rules('required');
        $form->select('category_id', '分类')
            ->options(Category::all(['id', 'name'])->pluck('name', 'id'))
            ->rules('required');
        $form->multipleSelect('tags', '标签')
            ->options(Tag::all(['id', 'name'])->pluck('name', 'id'))
            ->rules('required');
        $form->switch('is_draft', '草稿');
        if ($form->isCreating()){
            $form->simplemde('description', '摘要')->rules('required');
            $form->editormd('content', '内容')->rules('required');
        }
        return $form;
    }

    public function articleImages(Request $request)
    {
        $path = $request->file('editormd-image-file')->store('public/uploads/articles');
        return json_encode(['success'=>1, 'message' => '上传成功！','url' => asset('storage/'.substr($path,7))]);

    }
}
