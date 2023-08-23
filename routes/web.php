<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
    Route::get('login', '\App\Http\Controllers\Auth\LoginController@login')->name('login');
    Route::post('login', '\App\Http\Controllers\Auth\LoginController@authenticate')->name('login.confirm');

    Route::group(['middleware' =>'auth'], function() {

    Route::get('dashboard', function () {
        return view('welcome');
    });

    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    
    Route::get('groups', '\App\Http\Controllers\UserGroupsController@index');
    Route::get('groups/create', '\App\Http\Controllers\UserGroupsController@create');
    Route::post('groups', '\App\Http\Controllers\UserGroupsController@store');
    Route::delete('groups/{id}', '\App\Http\Controllers\UserGroupsController@distroy');


    
    Route::resource('users', '\App\Http\Controllers\UsersController');


    Route::get('users/{id}/sales', '\App\Http\Controllers\UserSalesController@index')->name('user.sales');

    Route::post('users/{id}/invoices', '\App\Http\Controllers\UserSalesController@createInvoice')->name('user.sales.store');
    Route::get('users/{id}/invoices/{invoice_id}', '\App\Http\Controllers\UserSalesController@invoice')->name('user.sales.invoice_details');
    Route::delete('users/{id}/invoices/{invoice_id}', '\App\Http\Controllers\UserSalesController@destroy')->name('user.sales.destroy');
    Route::post('users/{id}/invoices/{invoice_id}', '\App\Http\Controllers\UserSalesController@addItem')->name('user.sales.invoices.add_item');
    Route::delete('users/{id}/invoices/{invoice_id}/{item_id}', '\App\Http\Controllers\UserSalesController@destroy_item')->name('user.sales.invoices.delete_item');


    // Route for Purchase
    Route::get('users/{id}/purchases', '\App\Http\Controllers\UserPurchasesController@index')->name('user.purchases');

    Route::post('users/{id}/purchases', '\App\Http\Controllers\UserPurchasesController@createInvoice')->name('user.purchases.store');
    Route::get('users/{id}/purchases/{invoice_id}', '\App\Http\Controllers\UserPurchasesController@invoice')->name('user.purchases.invoice_details');
    Route::delete('users/{id}/purchases/{invoice_id}', '\App\Http\Controllers\UserPurchasesController@destroy')->name('user.purchases.destroy');
    Route::post('users/{id}/purchases/{invoice_id}', '\App\Http\Controllers\UserPurchasesController@addItem')->name('user.purchases.add_item');
    Route::delete('users/{id}/purchases/{invoice_id}/{item_id}', '\App\Http\Controllers\UserPurchasesController@destroy_item')->name('user.purchases.delete_item');


    // Route for Payments
    Route::get('users/{id}/payments', '\App\Http\Controllers\UserPaymentsController@index')->name('user.payments');
    Route::post('users/{id}/payments/{invoice_id?}', '\App\Http\Controllers\UserPaymentsController@store')->name('user.payments.store');
    Route::delete('users/{id}/payments/{payment_id}', '\App\Http\Controllers\UserPaymentsController@destroy')->name('user.payments.destroy');



    Route::get('users/{id}/receipts', '\App\Http\Controllers\UserReceiptsController@index')->name('user.receipts');
    Route::post('users/{id}/receipts/{invoice_id?}', '\App\Http\Controllers\UserReceiptsController@store')->name('user.receipts.store');
    Route::delete('users/{id}/receipts/{receipt_id}', '\App\Http\Controllers\UserReceiptsController@destroy')->name('user.receipts.destroy');
  


    
    Route::resource('categories', '\App\Http\Controllers\CategoriesController' , ['except' => ['show']]);

    Route::resource('products', '\App\Http\Controllers\ProductsController');


    Route::get('stocks', '\App\Http\Controllers\ProductsStockController@index')->name('stocks');


    Route::get('reposts/sales', '\App\Http\Controllers\Reports\SaleReportController@index')->name('reports.sales');
    
}); 



