<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\absensimahasiswa;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Redirect;

class AbsenController extends Controller
{
    //membuat tampilan awal
    public function getIndex() {
      return view('welcome');
    }

    //proses post dari absen, intinya masukkan data ke database
    public function PROSESGAN(Request $request) {
        $mahasiswa = DB::table('mahasiswa')->get();
        $dosen = DB::table('dosen')->get();
        $matkul = DB::table('matakuliah')->get();
        //inisiasi db dan request
        $status = $request->status;
        $tgl = $request->tgl;
        $dosen = $request->dosen;
        $matkul = $request->matkul;
        //checker kalo ada yg namanya 2 kali
        $temp = ""; $string = "";
        foreach ($status as $s) {
          //karena dari form, saya gunakan array,
          //dengan data yg di koma cara get nya seperti ini
          $ss = explode(",",$s);
          //karena pakai checkbox, bukan radio, maka user dapat
          // memasukkan dua data sekaligus,
          //sehingga kita lakukan check pada bagian backend, agar user hanya menginput satu data saja.
          //misal klik masuk saja.
          if ($ss[0] == $temp) {
            echo "masak 1 nama 2 status mas/mbak!";
            return;
          }
          $temp = $ss[0];
        }

        //nge save data nya ke database dengan laravel query builder + model.
        foreach ($status as $sta) {
          $ss2 = explode(",",$sta);
          $npm = $ss2[0];
          $stats = $ss2[1];
          $absensi = new absensimahasiswa();
          $absensi->npm_absen = $npm;
          $absensi->nip_absen = $dosen;
          $absensi->kd_matkul_absen = $matkul;
          $absensi->tanggal = $tgl;
          $absensi->status = $stats;
          $absensi->save();
          $namamhs = $mahasiswa->where('npm', $npm)->first()->nama;
        }
        return view('absen')->withErrors(['Data Berhasil di Masukkan', '']);
    }

    //jika user masuk ke hal
    public function gethitung() {
      return view('cekmasuk');
    }

    public function hitungabsensi(Request $request) {
      $mahasiswa = DB::table('mahasiswa')->get();
      $npm = $request->npm;
      $kode_mk = $request->kode_mk;
      $dosen = $request->dosen;
      //
      $masuk = DB::table('absensi')->where('kd_matkul_absen', $kode_mk)->where('nip_absen', $dosen)->where('npm_absen', $npm)->where('status', 'masuk')->count();
      $izin = DB::table('absensi')->where('kd_matkul_absen', $kode_mk)->where('nip_absen', $dosen)->where('npm_absen', $npm)->where('status', 'izin')->count();
      $sakit = DB::table('absensi')->where('kd_matkul_absen', $kode_mk)->where('nip_absen', $dosen)->where('npm_absen', $npm)->where('status', 'sakit')->count();
      $alfa = DB::table('absensi')->where('kd_matkul_absen', $kode_mk)->where('nip_absen', $dosen)->where('npm_absen', $npm)->where('status', 'alfa')->count();
      $namamhs = $mahasiswa->where('npm', $npm)->first()->nama;
      return view('ceksingle', ['dosen'=>$dosen, 'kode_mk'=>$kode_mk,
                                'namamhs'=>$namamhs, 'masuk'=>$masuk,
                                'izin'=>$izin, 'sakit'=>$sakit, 'alfa'=>$alfa]);
    }

    public function delete(Request $request) {
      DB::table('absensi')->delete();
      return view('utama')->withErrors(['Data Berhasil Di Hapus', '']);
    }

    public function finalisasi(Request $request) {

    }
}
