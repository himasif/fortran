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

// prefix
Route::group(['prefix' => 'fortran'], function () {
  Route::get('/', 'HomeController@welcome');

  Auth::routes();
  // METHOD GOBLOG
  Route::get('/logout', 'Auth\LoginController@logout');//AWKOAKWOKAOKWOKW GOBLOG
  // END OF METHOD GOBLOG

  Route::middleware('auth')->group(function (){
    Route::get('/admin', 'AdminController@home');
    Route::post('/admin/search', 'AdminController@findMahasiswa');
    Route::get('/admin/input_individu', 'AdminController@getDataInputIndividu');
    Route::post('/admin/input_individu', 'AdminController@setDataInputIndividu');
    Route::post('/admin/delete_individu', 'AdminController@deleteNilaiIndividu');
    Route::get('/admin/input_kelompok', 'AdminController@getDataInputKelompok');
    Route::post('/admin/input_kelompok', 'AdminController@setDataInputKelompok');
    Route::post('/admin/delete_kelompok', 'AdminController@deleteNilaiKelompok');
    Route::get('/admin/input_angkatan', 'AdminController@getDataInputAngkatan');
    Route::post('/admin/input_angkatan', 'AdminController@setDataInputAngkatan');
    Route::post('/admin/delete_angkatan', 'AdminController@deleteNilaiAngkatan');
    Route::get('/admin/input_batch', 'AdminController@getDataInputBatch');
    Route::post('/admin/input_batch', 'AdminController@setDataInputBatch');
    Route::get('/admin/resign', 'AdminController@getDataResignMahasiswa');
    Route::post('/admin/resign', 'AdminController@setDataResignMahasiswa');
    Route::get('/admin/list', 'AdminController@getListMahasiswa');
    Route::get('/admin/mahasiswa/{nim}', 'AdminController@getDetailMahasiswa');
    Route::post('/admin/mahasiswa/{nim}', 'AdminController@deleteNilaiFromDetailMahasiswa');
    Route::get('/admin/create_link', 'AdminController@getDataLink');
    Route::post('/admin/create_link', 'AdminController@setDataLink');
    Route::post('/admin/delete_link', 'AdminController@deleteLink');
  });
  Route::post('nilai', 'HomeController@checkScore');
});