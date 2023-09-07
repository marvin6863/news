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

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
