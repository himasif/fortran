<?php

use App\Kategori;
use App\Nilai;

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
Route::get('/admin/input_individu', function (){
  $kategori = Kategori::where('idKategori','<',6)->get();
  $lastmonth = date("m-Y",strtotime("-1 month"));
  $data = Nilai::where('nilais.idKategori','<',6)
                        ->whereMonth('nilais.tanggal', '<=', $lastmonth)
                        ->whereYear('nilais.tanggal', '<=', $lastmonth)
                        ->join('kategoris','nilais.idKategori','=','kategoris.idKategori')
                        ->join('mahasiswas','nilais.nim','=','mahasiswas.nim')
                        ->join('kelompoks','kelompoks.idKelompok','=','mahasiswas.idKelompok')->get();
  return view('admin.input_mahasiswa', ['kategori' => $kategori, 'data' => $data]);
});
