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


    Route::get('/category', 'CategoryController@index')->name('admin.categories');
    Route::get('/category/create', 'CategoryController@create');
    Route::get('/category/edit', 'CategoryController@edit');

    Route::get('/permission', 'PermissionController@index')->name('admin.permissions');
    Route::get('/permission/create', 'PermissionController@create')->name('permission.create');
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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
