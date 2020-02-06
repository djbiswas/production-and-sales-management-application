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

//Route::get('/', function () {
//    return view('admin');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');


Route::resource('/suppliers', 'SupplierController');
Route::resource('/productModels', 'ProductModelController');
Route::resource('/materialPurchases', 'MaterialPurchaseController');
Route::resource('/currencies', 'CurrencyController');
Route::resource('/customers', 'CustomerController');
Route::resource('/productTypes', 'ProductTypeController');
Route::resource('/stockItemGroups', 'StockItemGroupController');
Route::resource('/taxCategories', 'TaxCategoryController');
Route::resource('/stockUnits', 'StockUnitController');
Route::resource('/lcs', 'LcController');
Route::resource('/sales', 'SaleController');
Route::resource('/sales_returns', 'SalesReturnController');
Route::get('/sr_form/{id}', 'SalesReturnController@sr_form')->name('sales_returns.sr_form');

//Route::get('/sales_item', 'SalesController@sales_item')->name('sales_item');
//Route::get('/get-products', 'SalesController@getProducts');

Route::post('/addNewRow', 'SaleController@addNewRow');
Route::post('/single_sell_item', 'SaleController@single_sell_item');
