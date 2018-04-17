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

Route::get('/', 'ContactController@index')->name('contato');
Route::get('/createContact', 'ContactController@create')->name('createContact');
Route::post('/insertContact', 'ContactController@insert')->name('Incluir');
Route::delete('/remove/{id}', 'ContactController@destroy')->name('remove');
Route::get('/edit/{id}', 'ContactController@edit')->name('edit');
Route::post('/updateContact', 'ContactController@update')->name('Alterar');
Route::post('/searchContact', 'ContactController@search')->name('search');