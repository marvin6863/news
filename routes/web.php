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
Route::get('/listing', 'ListingPageController@index');
Route::get('/details', 'DetailsPageController@index');

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
    Route::put('/category/edit/{id}', 'CategoryController@update')->name('categories.update');
    Route::delete('/category/delete/{id}', 'CategoryController@destroy')->name('categories.delete');
    Route::put('/category/status/{id}', 'CategoryController@status');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
