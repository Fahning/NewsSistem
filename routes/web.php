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

Auth::routes();


Route::get('/', 'NewsController@index')->name('painel');
Route::get('/adiciona', ['uses' => 'NewsController@adiciona', 'as' => 'adiciona'])->middleware('auth');
Route::post('/store', ['uses' => 'NewsController@store', 'as' => 'store'])->middleware('auth');

Route::get('/editar/{id}', ['uses' => 'NewsController@edit', 'as' => 'editar'])->middleware('auth');
Route::put('/update/{id}/', ['uses' => 'NewsController@update', 'as' => 'update'])->middleware('auth');


Route::get('/excluir/{id}', ['uses' => 'NewsController@delete', 'as' => 'excluir'])->middleware('auth');
Route::get('/destroy/{id}', ['uses' => 'NewsController@destroy', 'as' => 'destroy'])->middleware('auth');

Route::post('/ChangePass', ['uses' => 'EditUserController@update', 'as' => 'updatePass'])->middleware('auth');


Route::get('/register', ['uses' => 'Auth\RegisterController@showRegistrationForm', 'as' => 'register'])->middleware('auth');
Route::post('/register', ['uses' => 'Auth\RegisterController@register'])->middleware('auth');