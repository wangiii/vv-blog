<?php

Route::get('/articles', 'ArticlesController@index')->name('articles');
Route::get('/article/{id}', 'ArticlesController@show')->name('article');
Route::get('/tag/{id}', 'TagsController@show')->name('tag');
Route::get('/tags', 'TagsController@index')->name('tags');
Route::get('/category/{id}', 'CategoriesController@show')->name('category');
Route::get('/categories', 'CategoriesController@index')->name('categories');