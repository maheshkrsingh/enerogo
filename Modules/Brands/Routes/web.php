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

Route::prefix('brands')->middleware('admin')->group(function() {
    Route::get('/brands', 'BrandsController@index')->name('brands.index');
    Route::get('/brands/add', 'BrandsController@create')->name('brands.create');
    Route::post('brands-store', 'BrandsController@store')->name('brands.store');
    Route::get('/brands/{id}/edit', 'BrandsController@edit')->name('brands.edit');
    Route::put('brands/{id}/updatesubmit', 'BrandsController@update')->name('brands.update');
    Route::get('/brands/{id}/delete', 'BrandsController@destroy')->name('brands.delete');
});
