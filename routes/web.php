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

Route::get('/customer', 'TestController@addform')->name('customer.add');
Route::post('/customer', 'TestController@saveData')->name('customer.save');
Route::get('/customer/list', 'TestController@fetchCustomer')->name('customer.list');
Route::get('/customer/edit/{id}', 'TestController@editform')->name('customer.edit');
Route::patch('/customer/edit/{id}', 'TestController@update')->name('customer.update');
Route::get('/customer/{id}', 'TestController@view')->name('customer.view');
Route::delete('/customer/{id}', 'TestController@delete_customer')->name('customer.delete');


