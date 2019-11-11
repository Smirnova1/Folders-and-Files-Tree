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

Route::get('/', 'IndexController@index')->name('index');
Route::get('/path/create', 'IndexController@create')->name('create');
Route::post('/path', 'IndexController@store')->name('store');
Route::get('/path/{id}', 'IndexController@show')->name('show');
Route::get('/path/{id}/edit', 'IndexController@edit')->name('edit');
Route::put('/path/{id}', 'IndexController@update')->name('update');
Route::delete('/path/{id}/delete', 'IndexController@destroy')->name('destroy');