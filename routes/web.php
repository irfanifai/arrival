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

Route::get('/', 'IndexController@index');

Route::get('/blog', 'IndexController@blog')->name('blog');
Route::get('/blog/{slug}', 'IndexController@show');

Route::post('/blog/{slug}/comment', 'IndexController@comment')->name('post.comment');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/admin/users', 'UsersController', ['as' => 'admin']);
Route::get('/admin/categories/trash', 'CategoriesController@trash')->name('admin.categories.trash');
Route::get('/admin/categories/{id}/restore', 'CategoriesController@restore')->name('admin.categories.restore');
Route::delete('/admin/categories/{id}/delete-permanent', 'CategoriesController@deletePermanent')->name('admin.categories.delete-permanent');
Route::resource('/admin/categories', 'CategoriesController', ['as' => 'admin']);

Route::get('/admin/ajax/categories/search','CategoriesController@ajaxSearch', ['as' => 'admin']);

Route::get('/admin/posts/trash', 'PostsController@trash')->name('admin.posts.trash');
Route::get('/admin/posts/{id}/restore', 'PostsController@restore')->name('admin.posts.restore');
Route::delete('/admin/posts/{id}/delete-permanent', 'PostsController@deletePermanent')->name('admin.posts.delete-permanent');
Route::resource('/admin/posts', 'PostsController', ['as' => 'admin']);

Route::get('/admin/settings', 'SettingsController@index')->name('admin.settings.index');
Route::post('/admin/settings', 'SettingsController@store')->name('admin.settings.store');
