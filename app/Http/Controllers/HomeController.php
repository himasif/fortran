<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Nilai;
use App\Angkatan;
use App\Kelompok;
use App\Mahasiswa;
use Illuminate\Support\Facades\Redirect;
use Config;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('home');
  }

  public function checkScore(Request $request)
  {
    if ($request->isMethod('post')) {
      $result = array();
      $nim = $request->nim;
      $result['mahasiswa'] = Mahasiswa::find($nim);
      $result['data'] = Nilai::where('nim', $nim)
        // ->join('kategoris','nilais.idKategori','=','kategoris.idKategori')
        // ->join('mahasiswas','nilais.nim','=','mahasiswas.nim')
        // ->join('kelompoks','kelompoks.idKelompok','=','mahasiswas.idKelompok')
        // ->where('kelompoks.idAngkatan', '=', $id_angkatan)
        ->get();

      if (!Mahasiswa::find($nim)) {
        return Redirect::to('/#invite')->with('message', 'NIM Tidak Ditemukan');
      }

      $nilai_kategori = array_fill(1, 22, 0);
      foreach ($result['data'] as $nilai) {
        $nilai_kategori[$nilai->idKategori]++;
      }
      $result['nilai_kategori'] = $nilai_kategori;

      $result['kategori_individu'] = Kategori::where('idKategori', '<', 13)->get();
      $result['kategori_kelompok'] = Kategori::whereBetween('idKategori', [13, 20])->get();
      $result['kategori_angkatan'] = Kategori::where('idKategori', '>', 20)->get();
      $result['final'] = $this->calculateFinalScore($nim);
      return view('nilai', $result);
    }
  }

  public function calculateFinalScore($nim)
  {
    $nilais = Nilai::where('nim', $nim)->get();
    $nilai_wajib = 0;
    $nilai_opsional = 0;
    foreach ($nilais as $nilai) {
      if (Kategori::find($nilai->idKategori)->kategori_wajib) {
        $nilai_wajib += $nilai->nilai;
      } else {
        $nilai_opsional += $nilai->nilai;
      }
    }
    $max_wajib = Config::get('app.NILAI_WAJIB_MAX');
    $max_opsional = Config::get('app.NILAI_OPSIONAL_MAX');
    $presentase_wajib = Config::get('app.PRESENTASE_WAJIB');
    $presentase_opsional = Config::get('app.PRESENTASE_OPSIONAL');

    $nilai_akhir = ($nilai_wajib / $max_wajib * $presentase_wajib) + ($nilai_opsional / $max_opsional * $presentase_opsional);

    if ($nilai_akhir >= 80) $score = "A";
    else if ($nilai_akhir >= 70) $score = "B";
    else $score = "C";

    $result = array();
    $result["nilai"] = round($nilai_akhir, 2);
    $result["score"] = $score;

    return $result;
  }
}
