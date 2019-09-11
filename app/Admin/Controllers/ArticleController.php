<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\Category;
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

        $grid->column('id', 'ID');
        $grid->column('title', '标题');
        $grid->column('describe', '简介');
        $grid->column('category_id', '分类')->display(function () {
            return $this->category->name;
        });
//        $grid->column('content', '内容');
        $grid->column('created_at', '创建时间');
        $grid->column('updated_at', '更新时间');

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
