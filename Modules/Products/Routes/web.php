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

Route::prefix('products')->middleware('admin')->group(function() {
    Route::get('/product/index', 'ProductsController@index')->name('products.index');
    Route::get('/product/add', 'ProductsController@create')->name('products.create');
    Route::post('product-post','ProductsController@store')->name('products.store');
    Route::get('/product/{id}/edit', 'ProductsController@edit')->name('products.edit');
    Route::put('product-put/{id}', 'ProductsController@update')->name('products.update');
    Route::get('/product/{id}/delete', 'ProductsController@destroy')->name('products.delete');
    Route::get('/productimage1/{id}/delete', 'ProductsController@productimage')->name('products.productimage.delete');
    Route::get('/product/product-color/delete/{productColorId}','ProductsController@productColorQtyDelete')->name('products.productColor.delete');
  
   
});
Route::group(['middleware'=>['admin']],function(){
    Route::post('/product/product-color/{product_color_id}','ProductsController@productColorQty');
  
});