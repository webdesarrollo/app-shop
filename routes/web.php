<?php

Route::get('/', 'FrontController@index');
Route::get('/producto/{id}', 'FrontController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout','Auth\LoginController@logout');

Route::middleware(['admin'])->prefix('admin')->group(function(){
    Route::resource('/productos', 'admin\ProductController');
    Route::resource('/productos/imagenes', 'admin\ImageController');
});