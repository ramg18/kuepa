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

Auth::routes();

Route::post('guardarlead', 'LeadsController@store')->name('guardar');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::put('actualizarlead', 'LeadsController@actualizarLead');
Route::get('filtroleads', 'LeadsController@filtrarLeads')->name('filtrar');

