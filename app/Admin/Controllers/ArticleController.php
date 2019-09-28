<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use http\Env\Request;

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
        $grid->model()->orderBy('created_at', 'desc');
        $grid->column('id', 'ID')->sortable();
        $grid->column('title', '标题');
        $grid->column('describe', '简介');
        $grid->column('tags', '标签')->display(function ($tags) {
            $tags = array_map(function ($tag) {
                return "<span class='label label-info'>{$tag['name']}</span>";
            }, $tags);
            return join('&nbsp;', $tags);
        });
        $grid->column('category_id', '分类')->display(function () {
            return "<span class='label label-success'>{$this->category->name}</span>";
        });
        $grid->column('created_at', '创建时间')->sortable();
        $grid->column('updated_at', '更新时间')->sortable();

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
        $show->getModel()->load('category');

        $show->field('id', 'ID');
        $show->field('title', '标题');
        $show->field('describe', '简介');
        $show->field('category_id', '分类')->as(function () {
            return $this->category->name;
        });
        $show->field('tags', '标签')->as(function () use ($show) {
            $tags = array_map(function ($tag) {
                return $tag['name'];
            }, $show->getModel()->tags->toArray());
            return join('&nbsp;&nbsp;', $tags);
        });
        $show->field('content', '正文');
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

        $form->display('id', 'ID');
        $form->text('title', '标题');
        $form->text('describe', '简介');
        $form->multipleSelect('tags', '标签')->options(Tag::all()->pluck('name', 'id'));
        $form->select('category_id', '分类')
            ->options(Category::all()->pluck('name', 'id'))
            ->rules('required');
        $form->textarea('content', '内容');

        $form->footer(function ($footer) {
            $footer->disableEditingCheck();
            $footer->disableCreatingCheck();
            $footer->disableViewCheck();
        });

        return $form;
    }

    public function index(Content $content)
    {
        return $content
            ->header('文章管理')
            ->body($this->grid());
    }

    public function edit($id, Content $content)
    {
        return $content
            ->header('修改文章')
            ->body($this->form()->edit($id));
    }

    public function create(Content $content)
    {
        return $content
            ->header('创建文章')
            ->body($this->form());
    }

    public function show($id, Content $content)
    {
        return $content
            ->header("查看文章")
            ->body($this->detail($id));
    }
}
