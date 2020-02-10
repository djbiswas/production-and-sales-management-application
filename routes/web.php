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


Route::resource('/bankAccounts', 'BankAccountController');
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

Route::get('/sales_report', 'Report@sales_report');
Route::get('get_sales_data', 'Report@get_sales_data')->name('get_sales_data');

Route::get('/purchases_report', 'Report@purchases_report');
Route::get('get_purchases_data', 'Report@get_purchases_data')->name('get_purchases_data');


Route::get('/stock_report', 'Report@stock_report');
Route::get('get_stock_data', 'Report@get_stock_data')->name('get_stock_data');

Route::get('/customer_report', 'Report@customer_report');

Route::post('/addNewRow', 'SaleController@addNewRow');
Route::post('/single_sell_item', 'SaleController@single_sell_item');
