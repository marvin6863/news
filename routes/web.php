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

Route::get('/', 'HomePageController@index');
Route::get('/category/{id}', 'CategoryPageController@show');
Route::get('/details/{slug}', 'DetailsPageController@index')->name('details');
Route::post('/comments', 'DetailsPageController@comment');


Route::group(['prefix'=>'back', 'middleware'=>'auth', 'namespace'=>'Admin'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('/permission', 'PermissionController@index')->middleware('permission:Permission List|All')->name('admin.permissions');
    Route::get('/permission/create', 'PermissionController@create')->middleware('permission:Permission List|All')->name('permission.create');
    Route::post('/permission/store  ', 'PermissionController@store');
    Route::get('/permission/edit/{id}', 'PermissionController@edit')->name('permission.edit');
    Route::put('/permission/update/{id}', 'PermissionController@update')->name('permission.update');
    Route::delete('/permission/delete/{id}', 'PermissionController@destroy')->name('permission.delete');

    Route::get('/roles', 'RoleController@index')->name('admin.roles');
    Route::get('/roles/create', 'RoleController@create')->name('roles.create');
    Route::post('/roles/store', 'RoleController@store');
    Route::get('/roles/edit/{id}', 'RoleController@edit')->name('roles.edit');
    Route::put('/roles/edit/{id}', ['uses'=>'RoleController@update','as'=>'roles.update'] );
    Route::delete('/roles/delete/{id}', 'RoleController@destroy')->name('roles.delete');

    Route::get('/authors', 'AuthorController@index')->name('admin.authors');
    Route::get('/authors/create', 'AuthorController@create')->name('authors.create');
    Route::post('/authors/store', 'AuthorController@store');
    Route::get('/authors/edit/{id}', 'AuthorController@edit')->name('authors.edit');
    Route::put('/authors/edit/{id}', ['uses'=>'AuthorController@update','as'=>'authors.update'] );
    Route::delete('/authors/delete/{id}', 'AuthorController@destroy')->name('authors.delete');

    Route::get('/categories', 'CategoryController@index')->middleware('permission:Category List|All')->name('admin.categories');
    Route::get('/category/create', 'CategoryController@create')->middleware('permission:Category Add|All')->name('categories.create');
    Route::post('/category/store', 'CategoryController@store')->middleware('permission:Category Add|All');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('categories.edit');
    Route::put('/category/update/{id}', 'CategoryController@update')->name('categories.update');
    Route::put('/category/status/{id}', 'CategoryController@status');
    Route::delete('/category/delete/{id}', 'CategoryController@destroy')->name('categories.delete');

    Route::get('/posts', 'PostController@index')->middleware('permission:Post List|All')->name('admin.posts');
    Route::get('/posts/create', 'PostController@create')->middleware('permission:Post Add|All')->name('posts.create');
    Route::post('/posts/store', 'PostController@store')->middleware('permission:Post Add|All');
    Route::get('/posts/edit/{id}', 'PostController@edit')->name('posts.edit');
    Route::put('/posts/update/{id}', 'PostController@update')->name('posts.update');
    Route::put('/posts/status/{id}', 'PostController@status')->name('posts.status');
    Route::put('/posts/hot/news/{id}', 'PostController@hot_news');
    Route::delete('/posts/delete/{id}', 'PostController@destroy')->name('posts.delete');

    Route::get('/comment/{id}', 'CommentController@index')->name('comments.list');
    Route::get('/comment/reply/{id}', 'CommentController@reply');
    Route::post('/comment/reply', 'CommentController@store');
    Route::put('/comment/status/{id}', 'CommentController@status')->name('comment.status');

    Route::get('/settings', 'SettingController@index')->name('setting');
    Route::put('/settings/update', 'SettingController@update');





});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
