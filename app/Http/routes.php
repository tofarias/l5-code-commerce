<?php


Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin'], function()
{
    Route::get('/categories/create', ['as' => 'category', 'uses' => 'AdminCategoriesController@create']);
    
    Route::get('/categories/show/{id?}', ['as' => 'category', function($id = 99)
    {
        return redirect()->action('AdminCategoriesController@show', [$id]);
    }])->where('id', '[0-9]+');
    
    Route::get('/categories/delete/id', ['as' => 'category', function($id)
    {
        return redirect()->action('AdminCategoriesController@delete', [$id]);
    }])->where('id', '[0-9]+');

    
    //
    
    Route::get('/products/create', ['as' => 'product', 'uses' => 'AdminProductsController@create']);
    
    Route::get('/products/show/{id?}', ['as' => 'product', function($id = 7)
    {
        return redirect()->action('AdminProductsController@show', [$id]);
    }])->where('id', '[0-9]+');
    
    Route::get('/products/delete/id', ['as' => 'product', function($id)
    {
        return redirect()->action('AdminProductsController@delete', [$id]);
    }])->where('id', '[0-9]+');

});
