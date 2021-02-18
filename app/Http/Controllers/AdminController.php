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

  public function Home()
  {
    $id_angkatan = Angkatan::where('namaAngkatan', Config::get('app.angkatan'))->get()->first()->idAngkatan;
    $data_top = Mahasiswa::orderBy('nilaiAkhir', 'DESC')
      ->join('kelompoks', 'kelompoks.idKelompok', '=', 'mahasiswas.idKelompok')
      ->where('kelompoks.idAngkatan', '=', $id_angkatan)
      ->get()->take(10);
    $data_low = Mahasiswa::orderBy('nilaiAkhir', 'ASC')
      ->join('kelompoks', 'kelompoks.idKelompok', '=', 'mahasiswas.idKelompok')
      ->where('kelompoks.idAngkatan', '=', $id_angkatan)
      ->get()->take(10);
    return view('admin.index', ['data_top' => $data_top, 'data_low' => $data_low]);
  }

  public function findMahasiswa(Request $request)
  {
    if ($request->isMethod('post')) {
      $id_angkatan = Angkatan::where('namaAngkatan', Config::get('app.angkatan'))->get()->first()->idAngkatan;
      $input = $request->nama_nim;
      if (preg_match('~[0-9]+~', $input)) {
        // NIM
        $mahasiswas = Mahasiswa::where('nim', 'like', '%' . $input . '%')
          ->join('kelompoks', 'kelompoks.idKelompok', '=', 'mahasiswas.idKelompok')
          ->where('kelompoks.idAngkatan', '=', $id_angkatan)
          ->get();
      } else {
        // NAMA
        $mahasiswas = Mahasiswa::where('nama', 'like', '%' . $input . '%')
          ->join('kelompoks', 'kelompoks.idKelompok', '=', 'mahasiswas.idKelompok')
          ->where('kelompoks.idAngkatan', '=', $id_angkatan)
          ->get();
      }
      $nilais = array();
      foreach ($mahasiswas as $mahasiswa) {
        $nilais[$mahasiswa->nim] = Nilai::where('nim', $mahasiswa->nim)->get();
      }
      // dd($nilais);
      // dd($data);
      return view('admin/search', ['mahasiswas' => $mahasiswas, 'nilais' => $nilais]);
    }
  }

  public function getDataInputIndividu()
  {
    $id_angkatan = Angkatan::where('namaAngkatan', Config::get('app.angkatan'))->get()->first()->idAngkatan;
    $kategori = Kategori::where('idKategori', '<', 13)->get();
    $data = Nilai::where('nilais.idKategori', '<', 13)
      ->join('kategoris', 'nilais.idKategori', '=', 'kategoris.idKategori')
      ->join('mahasiswas', 'nilais.nim', '=', 'mahasiswas.nim')
      ->join('kelompoks', 'kelompoks.idKelompok', '=', 'mahasiswas.idKelompok')
      ->where('kelompoks.idAngkatan', '=', $id_angkatan)->get();
    return view('admin.input_mahasiswa', ['kategori' => $kategori, 'data' => $data]);
  }

  public function setDataInputIndividu(Request $request)
  {
    if ($request->isMethod('post')) {
      $mahasiswa = Mahasiswa::find($request->nim);
      $mahasiswa->nilaiAkhir += $request->nilai;
      $data = new Nilai;
      $data->nim = $request->nim;
      $data->idKategori = $request->kategori;
      $data->tanggal = $request->tanggal;
      $data->keterangan = $request->keterangan;
      $data->nilai = $request->nilai;
      $temp = explode("/", $data->tanggal);
      $is_success = true;
      foreach ($temp as $d) {
        if (!is_numeric($d)) {
          $is_success = false;
        }
      }
      if ($is_success) {
        $data->tanggal = implode("-", [$temp[2], $temp[1], $temp[0]]);
        $mahasiswa->save();
        $data->save();
      } else {
        return redirect()->action('AdminController@getDataInputIndividu');
      }
    }
    return redirect()->action('AdminController@getDataInputIndividu');
  }

  public function getDataInputKelompok()
  {
    $kategori = Kategori::whereBetween('idKategori', [13, 20])->get();
    $id_angkatan = Angkatan::where('namaAngkatan', Config::get('app.angkatan'))->get()->first()->idAngkatan;
    $kelompok = Kelompok::where('idAngkatan', $id_angkatan)->get();
    // $data = DB::select("select nilai, namaKelompok, tanggal,idKategori from nilais join mahasiswas on nilais.nim = mahasiswas.nim join kelompoks on mahasiswas.idKelompok = kelompoks.idKelompok group by tanggal,idKategori");
    $data = Nilai::whereBetween('nilais.idKategori', [13, 20])
      ->join('mahasiswas', 'nilais.nim', '=', 'mahasiswas.nim')
      ->join('kelompoks', 'mahasiswas.idKelompok', '=', 'kelompoks.idKelompok')
      ->join('kategoris', 'nilais.idKategori', '=', 'kategoris.idKategori')
      // ->groupBy('tanggal')
      // ->groupBy('mahasiswas.idKelompok')
      // ->groupBy('nilais.idKategori')
      // ->groupBy('keterangan')
      ->where('kelompoks.idAngkatan', '=', $id_angkatan)
      ->get();
    $datas = array();
    foreach ($data as $d) { // unique algorithm
      $datas[$d->idKelompok] = $d;
    }
    // dd($data);
    // $data = array_unique($data);
    return view('admin.input_kelompok', ['kategori' => $kategori, 'data' => $datas, 'kelompok' => $kelompok]);
  }

  public function setDataInputKelompok(Request $request)
  {
    if ($request->isMethod('post')) {
      $kelompok = $request->kelompok;
      $data = Mahasiswa::where('idKelompok', '=', $kelompok)->get();
      foreach ($data as $value) {
        $mahasiswa = Mahasiswa::find($value->nim);
        $mahasiswa->nilaiAkhir += $request->nilai;
        $data = new Nilai;
        $data->nim = $value->nim;
        $data->idKategori = $request->kategori;
        $data->tanggal = $request->tanggal;
        $data->keterangan = $request->keterangan;
        $data->nilai = $request->nilai;
        $temp = explode("/", $data->tanggal);
        $is_success = true;
        foreach ($temp as $d) {
          if (!is_numeric($d)) {
            $is_success = false;
          }
        }
        if ($is_success) {
          $data->tanggal = implode("-", [$temp[2], $temp[1], $temp[0]]);

          //Cek apakah mahasiswa hadir atau tidak
          $check_kehadiran = Nilai::where([
            ['nim', '=', $value->nim],
            ['tanggal', '=', $data->tanggal]
          ])
            ->where(function ($q) {
              $q->where('idKategori', 7)
                ->orWhere('idKategori', 6);
            })
            ->get();
          if ($check_kehadiran->count() > 0) {
            continue;
          }
          //end of check
          else {
            $mahasiswa->save();
            $data->save();
          }
        } else {
          return redirect()->action('AdminController@getDataInputKelompok');
        }
      }
    }
    return redirect()->action('AdminController@getDataInputKelompok');
  }

  public function getDataInputAngkatan()
  {
    $kategori = Kategori::where('idKategori', '>', 20)->get();
    // $data = DB::select("select nilai, namaKelompok, tanggal,idKategori from nilais join mahasiswas on nilais.nim = mahasiswas.nim join kelompoks on mahasiswas.idKelompok = kelompoks.idKelompok group by tanggal,idKategori");
    $data = Nilai::where('nilais.idKategori', '>', 20)
      ->join('mahasiswas', 'nilais.nim', '=', 'mahasiswas.nim')
      ->join('kelompoks', 'mahasiswas.idKelompok', '=', 'kelompoks.idKelompok')
      ->join('angkatans', 'kelompoks.idAngkatan', '=', 'angkatans.idAngkatan')
      ->join('kategoris', 'nilais.idKategori', '=', 'kategoris.idKategori')
      ->get();
    $datas = array();
    foreach ($data as $d) { // unique algorithm
      $datas[$d->idKelompok] = $d;
    }
    return view('admin.input_angkatan', ['kategori' => $kategori, 'data' => $datas]);
  }

  public function setDataInputAngkatan(Request $request)
  {
    if ($request->isMethod('post')) {
      $angkatan = Angkatan::where('namaAngkatan', Config::get('app.angkatan'))->get()->first();
      // dd($angkatan->namaAngkatan);
      $data = Mahasiswa::join('kelompoks', 'mahasiswas.idKelompok', '=', 'kelompoks.idKelompok')->where('idAngkatan', '=', $angkatan->idAngkatan)->get();
      foreach ($data as $value) {
        $mahasiswa = Mahasiswa::find($value->nim);
        $mahasiswa->nilaiAkhir += $request->nilai;
        $data = new Nilai;
        $data->nim = $value->nim;
        $data->idKategori = $request->kategori;
        $data->tanggal = $request->tanggal;
        $temp = explode("/", $data->tanggal);
        $data->keterangan = $request->keterangan;
        $data->nilai = $request->nilai;
        $is_success = true;
        foreach ($temp as $d) {
          if (!is_numeric($d)) {
            $is_success = false;
          }
        }
        if ($is_success) {
          $data->tanggal = implode("-", [$temp[2], $temp[1], $temp[0]]);
          //Cek apakah mahasiswa hadir atau tidak
          $check_kehadiran = Nilai::where([
            ['nim', '=', $value->nim],
            ['tanggal', '=', $data->tanggal]
          ])
            ->where(function ($q) {
              $q->where('idKategori', 7)
                ->orWhere('idKategori', 6);
            })
            ->get();
          if ($check_kehadiran->count() > 0) {
            continue;
          }
          //end of check
          else {
            $mahasiswa->save();
            $data->save();
          }
        } else {
          return redirect()->action('AdminController@getDataInputAngkatan');
        }
      }
    }
    return redirect()->action('AdminController@getDataInputAngkatan');
  }

  public function deleteNilaiIndividu(Request $request)
  {
    if ($request->isMethod('post')) {
      $nilai = Nilai::find($request->id);
      $mahasiswa = Mahasiswa::find($nilai->nim);
      $mahasiswa->nilaiAkhir -= $nilai->nilai;
      $mahasiswa->save();
      $nilai->delete();
    }
    return redirect()->action('AdminController@getDataInputIndividu');
  }

  public function deleteNilaiKelompok(Request $request)
  {
    if ($request->isMethod('post')) {
      $data = Nilai::join('mahasiswas', 'nilais.nim', '=', 'mahasiswas.nim')
        ->where('tanggal', '=', $request->tanggal)
        ->where('idKelompok', '=', $request->idKelompok)
        ->where('idKategori', '=', $request->idKategori)
        ->where('keterangan', '=', $request->keterangan)->get();
      foreach ($data as $nilai) {
        $mahasiswa = Mahasiswa::find($nilai->nim);
        $mahasiswa->nilaiAkhir -= $nilai->nilai;
        $mahasiswa->save();
        $nilai->delete();
      }
    }
    return redirect()->action('AdminController@getDataInputKelompok');
  }

  public function deleteNilaiAngkatan(Request $request)
  {
    if ($request->isMethod('post')) {
      $data = Nilai::join('mahasiswas', 'nilais.nim', '=', 'mahasiswas.nim')
        ->join('kelompoks', 'mahasiswas.idKelompok', '=', 'kelompoks.idKelompok')
        ->where('tanggal', '=', $request->tanggal)
        ->where('idAngkatan', '=', $request->idAngkatan)
        ->where('idKategori', '=', $request->idKategori)->get();
      foreach ($data as $nilai) {
        $mahasiswa = Mahasiswa::find($nilai->nim);
        $mahasiswa->nilaiAkhir -= $nilai->nilai;
        $mahasiswa->save();
        $nilai->delete();
      }
    }
    return redirect()->action('AdminController@getDataInputAngkatan');
  }

  public function getDataInputBatch()
  {
    $kategori = Kategori::all();
    return view('admin.input_batch', ['kategori' => $kategori]);
  }

  public function setDataInputBatch(Request $request)
  {
    if ($request->isMethod('post')) {
      $angkatan = Angkatan::where('namaAngkatan', Config::get('app.angkatan'))->get()->first();
      // dd($angkatan->namaAngkatan);
      $exception_nim = explode(",", trim($request->exception_nim));
      $data = Mahasiswa::join('kelompoks', 'mahasiswas.idKelompok', '=', 'kelompoks.idKelompok')
        ->where('idAngkatan', '=', $angkatan->idAngkatan)
        ->whereNotIn('nim', $exception_nim)
        ->get();
      foreach ($data as $value) {
        $mahasiswa = Mahasiswa::find($value->nim);
        $mahasiswa->nilaiAkhir += $request->nilai;
        $mahasiswa->save();
        $data = new Nilai;
        $data->nim = $value->nim;
        $data->idKategori = $request->kategori;
        $data->tanggal = $request->tanggal;
        $temp = explode("/", $data->tanggal);
        $data->tanggal = implode("-", [$temp[2], $temp[1], $temp[0]]);
        $data->keterangan = $request->keterangan;
        $data->nilai = $request->nilai;
        $data->save();
      }
    }
    return redirect()->action('AdminController@getDataInputBatch');
  }

  public function calculateFinalScore()
  {
    $nim = 1234;
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

    $nilai_akhir = round(($nilai_wajib / $max_wajib * $presentase_wajib) + ($nilai_opsional / $max_opsional * $presentase_opsional), 2);

    if ($nilai_akhir >= 80) $score = "A";
    else if ($nilai_akhir >= 70) $score = "B";
    else $score = "C";

    $result = array();
    $result["nilai"] = $nilai_akhir;
    $result["score"] = $score;

    return $result;
  }

  public function getDataResignMahasiswa()
  {
    $data = Mahasiswa::where('idKelompok', Kelompok::where('namaKelompok', 'RESIGN')->get()->first()->idKelompok)->get();
    return view('admin.resign_mahasiswa', ['data' => $data]);
  }

  public function setDataResignMahasiswa(Request $request)
  {
    $nim = $request->nim;
    $mahasiswa = Mahasiswa::find($nim);
    $mahasiswa->idKelompok = Kelompok::where('namaKelompok', 'RESIGN')->get()->first()->idKelompok;
    $mahasiswa->save();

    return redirect()->action('AdminController@getDataResignMahasiswa');
  }

  public function getListMahasiswa()
  {
    $angkatan = Angkatan::where('namaAngkatan', Config::get('app.angkatan'))->get()->first();
    $data = Mahasiswa::join('kelompoks', 'mahasiswas.idKelompok', '=', 'kelompoks.idKelompok')
      ->where('idAngkatan', '=', $angkatan->idAngkatan)->get();
    return view('admin.list_mahasiswa', ['data' => $data]);
  }

  public function getDetailMahasiswa($nim)
  {
    $nilai = Nilai::where('nim', $nim)->get();
    $mahasiswa = Mahasiswa::find($nim);
    return view('admin.detail_mahasiswa', ['mahasiswa' => $mahasiswa, 'nilais' => $nilai]);
  }

  public function deleteNilaiFromDetailMahasiswa(Request $request, $nim)
  {
    if ($request->isMethod('post')) {
      $nilai = Nilai::find($request->id);
      $mahasiswa = Mahasiswa::find($nim);
      $mahasiswa->nilaiAkhir -= $nilai->nilai;
      $mahasiswa->save();
      $nilai->delete();
    }
    return redirect('admin/mahasiswa/' . $nim);
  }
}
