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
Route::group(['middleware'=>['web','admin']],function(){

    Route::get('admin-dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('/logout', 'Auth\LoginController@logout');
});

Route::group(['prefix'=>'admin','middleware'=>['guest']],function() {

   Route::get('/login','Auth\LoginController@login')->name('admin.login');
   Route::post('login-post','Auth\LoginController@loginpost')->name('admin.login.post');
});
