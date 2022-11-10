<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Nilai;
use App\Lomba;
use App\Angkatan;
use App\Kelompok;
use App\Mahasiswa;
use App\Link;
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

  public function welcome()
  {
    $data = Link::all();
    $lomba = Lomba::all();
    $total = 0;
    foreach ($lomba as $item) {
      $total += $item->jumlah;
    }
    return view('welcome', ['data' => $data, 'lomba' => $lomba, 'total' => $total]);
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
        return redirect()->to('#invite')->with('message', 'NIM Tidak Ditemukan');
      }

      $nilai_kategori = array_fill(0, 42, 0);
      foreach ($result['data'] as $nilai) {
        $nilai_kategori[$nilai->idKategori]++;
      }
      $result['nilai_kategori'] = $nilai_kategori;

      $result['kategori_individu'] = Kategori::where('jenis_kategori', '=', 'individu')->get();
      $result['kategori_kelompok'] = Kategori::where('jenis_kategori', '=', 'kelompok')->get();
      $result['kategori_angkatan'] = Kategori::where('jenis_kategori', '=', 'angkatan')->get();
      $result['final'] = $this->calculateFinalScore($nim);
      return view('nilai', $result);
    }
  }

  public function calculateFinalScore($nim)
  {
    $nilais = Nilai::where('nim', $nim)->get();
    $nilai_total = 0;
    foreach ($nilais as $nilai) {
      $nilai_total += $nilai->nilai;
    }

    if ($nilai_total >= 75) $lulus = "Nilai Mencukupi, Pertahankan Terus!";
    else $lulus = "Nilai Belum Mencukupi, Tingkatkan Lagi!";

    $result = array();
    $result["nilai"] = $nilai_total;
    $result["lulus"] = $lulus;

    return $result;
  }
}
