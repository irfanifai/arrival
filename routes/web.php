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

// Root
Route::get('/', 'IndexController@index');

// Blog
Route::get('/blog', 'IndexController@blog')->name('blog');
Route::get('/blog/{slug}', 'IndexController@show');
Route::post('/blog/{slug}/comment', 'IndexController@comment')->name('post.comment');

// About
Route::get('/about', 'IndexController@about')->name('about');

// Contact
Route::get('/contact', 'IndexController@contact')->name('contact.index');
Route::post('/contact', 'IndexController@contactStore')->name('contact.store');

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    // Admin Login Routes
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    // Halaman Utama
    Route::get('/home', 'HomeController@index')->name('home');
    // Pengguna
    Route::resource('users', 'UsersController');
    // Kategori
    Route::get('categories/trash', 'CategoriesController@trash')->name('categories.trash');
    Route::get('categories/{id}/restore', 'CategoriesController@restore')->name('categories.restore');
    Route::delete('categories/{id}/delete-permanent', 'CategoriesController@deletePermanent')->name('categories.delete-permanent');
    Route::resource('categories', 'CategoriesController');
    Route::get('ajax/categories/search','CategoriesController@ajaxSearch');
    // Artikel
    Route::get('posts/trash', 'PostsController@trash')->name('posts.trash');
    Route::get('posts/{id}/restore', 'PostsController@restore')->name('posts.restore');
    Route::delete('posts/{id}/delete-permanent', 'PostsController@deletePermanent')->name('posts.delete-permanent');
    Route::resource('posts', 'PostsController');
    // Komentar
    Route::get('comments/trash', 'CommentsController@trash')->name('comments.trash');
    Route::get('comments/{id}/restore', 'CommentsController@restore')->name('comments.restore');
    Route::delete('comments/{id}/delete-permanent', 'CommentsController@deletePermanent')->name('comments.delete-permanent');
    Route::resource('comments', 'CommentsController', ['except' => ['create', 'store']]);
    // Pengaturan Footer
    Route::get('settings', 'SettingsController@index')->name('settings.index');
    Route::post('settings', 'SettingsController@store')->name('settings.store');
    // Tentang
    Route::resource('about', 'AboutController');
    // Pesan
    Route::resource('messages', 'MessagesController');
    Route::post('messages/send-email', 'MessagesController@sendEmail')->name('messages.email');
});


