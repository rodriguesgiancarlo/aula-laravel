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
    $msg = 'Olá mundo!';
    $pessoas = array(1, 2 , 3);
    return view('welcome', compact(['msg', 'pessoas']));
});

Route::get('/cervejarias', 'CervejariaController@index')->name('cervejarias.index');
Route::get('/cervejarias/{cervejaria_id}/show', 'CervejariaController@show')->name('cervejarias.show');
Route::get('/cervejarias/create', 'CervejariaController@create')->name('cervejarias.create');
Route::post('/cervejarias', 'CervejariaController@store')->name('cervejarias.store');
Route::get('/cervejarias/{cervejaria_id}/edit', 'CervejariaController@edit')->name('cervejarias.edit');
Route::put('/cervejarias/{cervejaria_id}', 'CervejariaController@update')->name('cervejarias.update');
Route::delete('/cervejarias/{cervejaria_id}', 'CervejariaController@destroy')->name('cervejarias.destroy');


Route::resource('cervejas', 'CervejaController', ['except' => array('show')]);