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
    Route::get('users/{id}/purchases', '\App\Http\Controllers\UserPurchasesController@index')->name('user.purchases');

    Route::get('users/{id}/payments', '\App\Http\Controllers\UserPaymentsController@index')->name('user.payments');
    Route::post('users/{id}/payments', '\App\Http\Controllers\UserPaymentsController@store')->name('user.payments.store');
    Route::delete('users/{id}/payments/{payment_id}', '\App\Http\Controllers\UserPaymentsController@destroy')->name('user.payments.destroy');



    Route::get('users/{id}/receipts', '\App\Http\Controllers\UserReceiptsController@index')->name('user.receipts');
  


    
    Route::resource('categories', '\App\Http\Controllers\CategoriesController' , ['except' => ['show']]);

    Route::resource('products', '\App\Http\Controllers\ProductsController');
    
}); 



