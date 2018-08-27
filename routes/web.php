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
Route::get('test', function(){
  return view('admin.index');
});
Route::get('/admin', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function (){
  Route::get('/admin/input_individu', 'AdminController@getDataInputIndividu');
  Route::post('/admin/input_individu', 'AdminController@setDataInputIndividu');
  Route::get('/admin/input_kelompok', 'AdminController@getDataInputKelompok');
  Route::post('/admin/input_kelompok', 'AdminController@setDataInputKelompok');
});
