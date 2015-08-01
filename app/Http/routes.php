<?php

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'where' => ['id' => '[0-9]+']], function()
{
	Route::group(['prefix' => 'categories', 'where' => ['id' => '[0-9]+']], function()
	{
		Route::get('/', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
		Route::post('/', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
		Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
		Route::get('{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
		Route::get('{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
		Route::post('{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
	});
	
	Route::group(['prefix' => 'products', 'where' => ['id' => '[0-9]+']], function()
	{
		Route::get('/', ['as' => 'products', 'uses' => 'ProductsController@index']);
		Route::post('/', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
		Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
		Route::get('{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
		Route::get('{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
		Route::post('{id}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);

		Route::group(['prefix' => 'images'], function()
		{
			Route::get('{id}/product', ['as' => 'products.images', 'uses' => 'ProductsController@images']);
			Route::get('create/{id}/product', ['as' => 'products.images.create', 'uses' => 'ProductsController@createImage']);
			Route::post('store/{id}/product', ['as' => 'products.images.store', 'uses' => 'ProductsController@storeImage']);
			Route::get('destroy/{id}/product', ['as' => 'products.images.destroy', 'uses' => 'ProductsController@destroyImage']);
		});
	});
	
});


Route::get('/', 'StoreController@index');
Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);
Route::get('cart', ['as' => 'cart', 'uses' => 'CartController@index']);
Route::get('cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
Route::get('cart/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);

Route::group(['middleware' => 'auth'], function(){
	
	Route::get('checkout/placeOrder', ['as' => 'checkout.place', '', 'uses' => 'CheckoutController@place']);
	
	Route::get('account/account.orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);
});



Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);