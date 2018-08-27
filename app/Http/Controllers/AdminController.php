<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Nilai;
use App\Angkatan;
use App\Kelompok;
use App\Mahasiswa;
use Config;

class AdminController extends Controller
{
  public function getDataInputIndividu()
  {
    $id_angkatan = Angkatan::where('namaAngkatan', Config::get('app.angkatan'))->get()->first()->idAngkatan;
    $kategori = Kategori::where('idKategori','<',6)->get();
    $data = Nilai::where('nilais.idKategori','<',6)
    ->join('kategoris','nilais.idKategori','=','kategoris.idKategori')
    ->join('mahasiswas','nilais.nim','=','mahasiswas.nim')
    ->join('kelompoks','kelompoks.idKelompok','=','mahasiswas.idKelompok')
    ->where('kelompoks.idAngkatan', '=', $id_angkatan)->get();
    return view('admin.input_mahasiswa', ['kategori' => $kategori, 'data' => $data]);
  }

  public function setDataInputIndividu(Request $request)
  {
    if($request->isMethod('post')){
      $data = new Nilai;
      $data->nim = $request->nim;
      $data->idKategori = $request->kategori;
      $data->tanggal = $request->tanggal;
      $data->keterangan = $request->keterangan;
      $data->nilai= $request->nilai;
      $temp = explode("/", $data->tanggal);
      $data->tanggal = implode("-", [$temp[2], $temp[1], $temp[0]]);
      $data->save();
      return redirect()->action('AdminController@getDataInputIndividu');
    }
  }

  public function getDataInputKelompok()
  {
    $kategori = Kategori::whereBetween('idKategori',[6,9])->get();
    $id_angkatan = Angkatan::where('namaAngkatan', Config::get('app.angkatan'))->get()->first()->idAngkatan;
    $kelompok = Kelompok::where('idAngkatan', $id_angkatan)->get();
    // $data = DB::select("select nilai, namaKelompok, tanggal,idKategori from nilais join mahasiswas on nilais.nim = mahasiswas.nim join kelompoks on mahasiswas.idKelompok = kelompoks.idKelompok group by tanggal,idKategori");
    $data = Nilai::whereBetween('nilais.idKategori',[6,9])
    ->join('mahasiswas','nilais.nim','=','mahasiswas.nim')
    ->join('kelompoks','mahasiswas.idKelompok','=','kelompoks.idKelompok')
    ->join('kategoris','nilais.idKategori','=','kategoris.idKategori')
    // ->groupBy('tanggal')
    // ->groupBy('mahasiswas.idKelompok')
    // ->groupBy('nilais.idKategori')
    // ->groupBy('keterangan')
    ->where('kelompoks.idAngkatan', '=', $id_angkatan)
    ->get();
    return view('admin.input_kelompok', ['kategori' => $kategori, 'data' => $data, 'kelompok' => $kelompok]);
  }

  public function setDataInputKelompok(Request $request){
        if($request->isMethod('post')){
          $kelompok = $request->kelompok;
          $data = Mahasiswa::where('idKelompok','=',$kelompok)->get();
          foreach($data as $value){
              $data = new Nilai;
              $data->nim = $value->nim;
              $data->idKategori = $request->kategori;
              $data->tanggal = $request->tanggal;
              $data->keterangan = $request->keterangan;
              $data->nilai= $request->nilai;
              $temp = explode("/", $data->tanggal);
              $data->tanggal = implode("-", [$temp[2], $temp[1], $temp[0]]);
              $data->save();
          }
          return redirect()->action('AdminController@getDataInputKelompok');
        }
    }
}
