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

Route::prefix('category')->middleware('admin')->group(function() {
    
    Route::get('/categories', 'CategoriesController@index')->name('category.index');
    Route::get('/categories/add', 'CategoriesController@create')->name('category.create');
    Route::post('categories-post', 'CategoriesController@store')->name('category.submitdata');
    Route::get('/categories/{id}/edit', 'CategoriesController@edit')->name('category.edit');
    Route::put('categories/{id}/updatesubmit', 'CategoriesController@update')->name('category.updatedata');
    Route::get('/categories/{id}/delete', 'CategoriesController@destroy')->name('category.delete');
});
