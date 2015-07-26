<?php

Route::get('/categories', 'CategoriesController@index');

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin'], function()
{
    Route::get('categories/create', ['as' => 'categorycreate', 'uses' => 'AdminCategoriesController@create']);
    
    Route::get('categories/{id?}', ['as' => 'categoryshow', 'uses' => 'AdminCategoriesController@show'])->where('id', '[0-9]+');
    
    Route::get('categories/delete/{id}', ['as' => 'categorydelete', 'uses' => 'AdminCategoriesController@delete'])->where('id', '[0-9]+');

    
    //
    
    Route::get('products/create', ['as' => 'productcreate', 'uses' => 'AdminProductsController@create']);
    
    Route::get('products/{id?}', ['as' => 'productshow', 'uses' => 'AdminProductsController@show'])->where('id', '[0-9]+');
    
    Route::get('products/delete/{id}', ['as' => 'productdelete', 'uses' => 'AdminProductsController@delete'])->where('id', '[0-9]+');

});
