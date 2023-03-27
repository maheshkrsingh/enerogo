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

Route::prefix('slider')->middleware(['web','admin'])->group(function() {

    Route::get('/', 'SliderController@index')->name('slider.index');
    Route::get('/slider/add', 'SliderController@create')->name('slider.create');
    Route::post('/slider/create-post', 'SliderController@store')->name('slider.store');
    Route::get('/slider/edit/{id}', 'SliderController@edit')->name('slider.edit');
    Route::post('/slider/edit-post/{id}', 'SliderController@update')->name('slider.update');
    Route::get('/slider/edit-post/{id}/delete', 'SliderController@delete')->name('slider.delete');
    
});
