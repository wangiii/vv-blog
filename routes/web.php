<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Route::get('/', 'PagesController@index')->name('root');
Route::get('/', 'ArticlesController@index')->name('articles');
Route::get('/article/{id}', 'ArticlesController@show')->name('article');
Route::get('/tag/{id}', 'TagsController@show')->name('tag');
Route::get('/tags', 'TagsController@index')->name('tags');
Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('/category/{id}', 'CategoriesController@show')->name('category');
