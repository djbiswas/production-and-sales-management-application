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

Route::get('/admin/{id}', 'HomeController@admin')->name('admin');
Route::get('/', 'HomeController@index')->name('home');


    Route::resource('/suppliers', 'SupplierController');
    Route::resource('/productModels', 'ProductModelController');
    Route::resource('/rawmaterials', 'RawmaterialController');
    Route::resource('/materialPurchases', 'MaterialPurchaseController');

    Route::resource('/customers', 'CustomerController');

    Route::resource('/lcs', 'LcController');
    Route::resource('/sales', 'SaleController');
    Route::get('/customer_pay/{id}', 'CustomerController@customer_pay')->name('customer_pay');
    Route::post('/customer_paid', 'CustomerController@customer_paid')->name('customer_paid');
    Route::resource('/sales_returns', 'SalesReturnController');
    Route::get('/sr_form/{id}', 'SalesReturnController@sr_form')->name('sales_returns.sr_form');

    //Route::get('/sales_item', 'SalesController@sales_item')->name('sales_item');
    //Route::get('/get-products', 'SalesController@getProducts');

    Route::get('/sales_report', 'Report@sales_report');
    Route::get('get_sales_data', 'Report@get_sales_data')->name('get_sales_data');

    Route::get('/profit_loss', 'Report@profit_loss');
    Route::get('get_profit_loss', 'Report@get_profit_loss')->name('get_profit_loss');

    Route::get('/purchases_report', 'Report@purchases_report');
    Route::get('get_purchases_data', 'Report@get_purchases_data')->name('get_purchases_data');

    Route::get('/stock_report', 'Report@stock_report');
    Route::get('get_stock_data', 'Report@get_stock_data')->name('get_stock_data');

    Route::get('/customer_reports', 'Report@customer_reports')->name('customer_reports');
    Route::get('get_customers_data', 'Report@get_customers_data')->name('get_customers_data');

    Route::get('/customer_report', 'Report@customer_report');
    Route::post('/get_lc', 'MaterialPurchaseController@get_lc');

    Route::post('/addNewRow', 'SaleController@addNewRow');
    Route::post('/single_sell_item', 'SaleController@single_sell_item');


Route::resource('/currencies', 'CurrencyController');
Route::resource('/bankAccounts', 'BankAccountController');
Route::resource('/productTypes', 'ProductTypeController');
Route::resource('/stockItemGroups', 'StockItemGroupController');
Route::resource('/stockUnits', 'StockUnitController');
Route::resource('/taxCategories', 'TaxCategoryController');

//Route::prefix('tiles')->group(function (){
//    Route::resource('/suppliers', 'SupplierController');
//    Route::resource('/rawmaterials', 'RawmaterialController');
//    Route::resource('/materialPurchases', 'MaterialPurchaseController');
//    Route::resource('/banks', 'Bank');
//});

Route::resource('/stone', 'StoneController');
Route::resource('/tiles', 'TilesController');
