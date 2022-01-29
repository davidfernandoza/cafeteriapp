<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ProductController@showProducts');
Route::get('/categorias', 'CategoryController@showCategories');
Route::get('/ventas', 'SaleController@showSales');
Route::post('/sales/save-sale/product/{product}', 'SaleController@saveSale');

Route::prefix('products')->group(function () {
	Route::post('/save-product', 'ProductController@saveProduct');
	Route::post('/update-product/{product}', 'ProductController@updateProduct');
	Route::post('/delete-product/{product}', 'ProductController@deleteProduct');
});

Route::prefix('categories')->group(function () {
	Route::get('/get-categories', 'CategoryController@getCategories');
	Route::post('/save-category', 'CategoryController@saveCategory');
	Route::post('/update-category/{category}', 'CategoryController@updateCategory');
});
