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

// subdomain
Route::prefix('fortran')->group(function () {
  Route::get('/', 'HomeController@welcome')->name('main');

  Auth::routes();
  // METHOD GOBLOG
  Route::get('/logout', 'Auth\LoginController@logout')->name('logout');//AWKOAKWOKAOKWOKW GOBLOG
  // END OF METHOD GOBLOG

  Route::middleware('auth')->group(function (){
    Route::get('/admin', 'AdminController@home')->name('admin');
    Route::post('/admin/search', 'AdminController@findMahasiswa')->name('search');
    Route::get('/admin/input_individu', 'AdminController@getDataInputIndividu')->name('get_input_individu');
    Route::post('/admin/input_individu', 'AdminController@setDataInputIndividu')->name('set_input_individu');
    Route::post('/admin/delete_individu', 'AdminController@deleteNilaiIndividu')->name('delete_individu');
    Route::get('/admin/input_kelompok', 'AdminController@getDataInputKelompok')->name('get_input_kelompok');
    Route::post('/admin/input_kelompok', 'AdminController@setDataInputKelompok')->name('set_input_kelompok');
    Route::post('/admin/delete_kelompok', 'AdminController@deleteNilaiKelompok')->name('delete_kelompok');
    Route::get('/admin/input_angkatan', 'AdminController@getDataInputAngkatan')->name('get_input_angkatan');
    Route::post('/admin/input_angkatan', 'AdminController@setDataInputAngkatan')->name('set_input_angkatan');
    Route::post('/admin/delete_angkatan', 'AdminController@deleteNilaiAngkatan')->name('delete_angkatan');
    Route::get('/admin/input_batch', 'AdminController@getDataInputBatch')->name('get_input_batch');
    Route::post('/admin/input_batch', 'AdminController@setDataInputBatch')->name('set_input_batch');
    Route::get('/admin/resign', 'AdminController@getDataResignMahasiswa')->name('get_resign');
    Route::post('/admin/resign', 'AdminController@setDataResignMahasiswa')->name('set_resign');
    Route::get('/admin/list', 'AdminController@getListMahasiswa')->name('list_mahasiswa');
    Route::get('/admin/mahasiswa/{nim}', 'AdminController@getDetailMahasiswa')->name('get_mahasiswa');
    Route::post('/admin/mahasiswa/{nim}', 'AdminController@deleteNilaiFromDetailMahasiswa')->name('delete_mahasiswa');
    Route::get('/admin/create_link', 'AdminController@getDataLink')->name('get_link');
    Route::post('/admin/create_link', 'AdminController@setDataLink')->name('set_link');
    Route::post('/admin/delete_link', 'AdminController@deleteLink')->name('delete_link');
  });
  Route::post('nilai', 'HomeController@checkScore')->name('nilai');
});