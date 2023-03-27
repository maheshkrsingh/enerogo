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

Route::prefix('colors')->group(function() {
    Route::get('/color/index1', 'ColorsController@index')->name('colors.index');
    Route::get('/color/add', 'ColorsController@create')->name('colors.add');
    Route::post('color-posts', 'ColorsController@store')->name('colors.store');
    Route::put('color-updates/{id}', 'ColorsController@update')->name('colors.update');
    Route::get('/color/edit/{id}', 'ColorsController@edit')->name('colors.edit');
    Route::get('/color/delete/{id}', 'ColorsController@destroy')->name('colors.delete');
});
