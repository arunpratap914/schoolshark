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

Route::get('activate/{token}', 'Auth\RegisterController@activate')->name('activate');

Route::get('/home', 'HomeController@index')->name('home');







Route::middleware(['admin','auth'])->namespace('Admin')->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/profile', 'AdminController@view_profile')->name('admin_view_profile');
    Route::post('/admin/update_image', 'AdminController@update_image')->name('admin_update_image');
    Route::post('/admin/update_detail', 'AdminController@update_detail')->name('admin_update_detail');
    Route::get('/admin/change-password', 'AdminController@change_password')->name('admin_change_password');
    Route::post('/admin/update_password', 'AdminController@update_password')->name('admin_update_password');
    Route::get('/admin/users-list', 'AdminController@users_list')->name('admin_users_list');
});