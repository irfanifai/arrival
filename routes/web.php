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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/admin/users', 'UsersController', ['as' => 'admin']);
Route::get('admin/categories/trash', 'CategoriesController@trash')->name('admin.categories.trash');
Route::get('/admin/categories/{id}/restore', 'CategoriesController@restore')->name('admin.categories.restore');
Route::delete('admin/categories/{id}/delete-permanent', 'CategoriesController@deletePermanent')->name('admin.categories.delete-permanent');
Route::resource('/admin/categories', 'CategoriesController', ['as' => 'admin']);
