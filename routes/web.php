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

//Route::get('/', function () {return view('welcome');});
Route::get('/','candidatosController@index')->name('index');
Route::get('/candidatos/create','candidatosController@Create')->name('createCandidato');
Route :: post('/candidatos/create', 'candidatosController@store');