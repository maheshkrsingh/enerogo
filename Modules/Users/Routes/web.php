<?php
  use Illuminate\Support\Facades\Route;
  
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

Route::group(['prefix'=>'users','middleware' => ['guest']],function(){
  
    Route::get('/index', 'UsersController@index')->name('users.index');
    Route::get('/login','Auth\LoginController@login')->name('users.login');
    Route::post('/login-post','Auth\LoginController@loginpost')->name('users.login.post');
    Route::get('/register','Auth\RegisterController@register')->name('users.register');
    Route::post('register-post','Auth\RegisterController@registerpost')->name('users.register.post');
   
});
