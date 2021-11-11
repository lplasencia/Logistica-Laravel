<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Customer

Route::get('customer/index','CustomerController@index')->name('customer.index');
Route::get('customer/create','CustomerController@create')->name('customer.create');
Route::post('customer/store','CustomerController@store')->name('customer.store');
Route::get('customer/list','CustomerController@list')->name('customer.list');
Route::get('customer/edit/{id}','CustomerController@edit')->name('customer.edit');
Route::put('customer/update/{id}','CustomerController@update')->name('customer.update');
Route::get('/customer/delete/{id}','CustomerController@delete')->name('customer.delete');
Route::get(('cancelarCustomer'), function(){
    return redirect()->route('customer.index')->with('datos', 'Acción Cancelada');
})->name('cancelarCustomer');

//Supplier

Route::get('supplier/index','SupplierController@index')->name('supplier.index');
Route::get('supplier/create','SupplierController@create')->name('supplier.create');
Route::post('supplier/store','SupplierController@store')->name('supplier.store');
Route::get('supplier/list','SupplierController@list')->name('supplier.list');
Route::get('supplier/edit/{id}','SupplierController@edit')->name('supplier.edit');
Route::put('supplier/update/{id}','SupplierController@update')->name('supplier.update');
Route::get('/supplier/delete/{id}','SupplierController@delete')->name('supplier.delete');
Route::get(('cancelarSupplier'), function(){
    return redirect()->route('supplier.index')->with('datos', 'Acción Cancelada');
})->name('cancelarSupplier');

//Product




