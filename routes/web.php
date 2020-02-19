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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/customers', 'CustomerController@index');
Route::get('/customers/show/{id}', 'CustomerController@show');
Route::get('customers/create','CustomerController@create');
Route::post('/customers/add', 'CustomerController@add');
Route::get('/customers/edit/{id}', 'CustomerController@edit');
Route::post('customers/update/{id}', 'CustomerController@update');
Route::get('/customers/changeProfile/{id}', 'CustomerController@changeProfile');
Route::post('customers/updateProfile/{id}', 'CustomerController@updateProfile');
Route::get('customers/delete/{id}', 'CustomerController@delete');
Route::get('customers/search_form', 'CustomerController@search_form');
Route::post('customers/search', 'CustomerController@search');