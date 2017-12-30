@extends('layouts.master')

@php
  $mahasiswa = DB::table('mahasiswa')->get();
  $dosen = DB::table('dosen')->get();
  $matkul = DB::table('matakuliah')->get();
  $absensimahasiswa = DB::table('absensi')->get();
@endphp

@section('judul')
  Hitung Absensi
@endsection

@section('list')
  <li><a href="/">Beranda</a></li>
  <li><a href="/absen">Absen</a></li>
  <li class="active"><a href="/hitungabsensi">Hitung Absen</a></li>
  <li><a href="/deleteabsen">Delete Absen</a></li>
@endsection

@section('isinya')
<div class="container">
  <div class="row">
    <h1>Cek kehadiran seorang mahasiswa</h1>
    <form class="" action="{{url(action('AbsenController@hitungabsensi'))}}" method="post">
      {{ csrf_field() }}
      <label for="">Mata Kuliah : </label>
      <select name="kode_mk">
        @foreach ($matkul as $mk)
          <option value="{{$mk->kode_mk}}">{{$mk->matkul}}</option>
        @endforeach
      </select>
      <br>
      <label for="">Dosen : </label>
      <select name="npm">
        @foreach ($dosen as $dsn)
          <option value="{{$dsn->nip}}">{{$dsn->nama}}</option>
        @endforeach
      </select>
      <br>
      <label for="">Mahasiswa yg dicari : </label>
      <select name="npm">
        @foreach ($mahasiswa as $mhs)
          <option value="{{$mhs->npm}}">{{$mhs->nama}}</option>
        @endforeach
      </select>
      <input class="btn btn-info btn-block" type="submit" name="submit" value="submit">
    </form>
    <h1>Tabel Kehadiran</h1>
    <p>Total absensi dalam database : {{DB::table('absensi')->count()}}</p>
        <table border="1px" style="width:100%;">
          <tr>
            <thead>
              <th>Nama Mahasiswa</th>
              <th>Mata Kuliah</th>
              <th>Dosen</th>
              <th>Masuk</th>
              <th>Izin</th>
              <th>Sakit</th>
              <th>Alfa</th>
            </thead>
          </tr>

          @foreach ($dosen as $dsn)
            @foreach ($matkul as $mk)
              @foreach ($mahasiswa as $mhs)
                @php
                $kode_mk = $mk->kode_mk;
                $npm = $mhs->npm;
                if (! DB::table('absensi')->count() == 0) {
                  $masuk = DB::table('absensi')->where('nip_absen', $dsn->nip)->where('kd_matkul_absen', $kode_mk)->where('npm_absen', $npm)->where('status', 'masuk')->count();
                  $izin = DB::table('absensi')->where('nip_absen', $dsn->nip)->where('kd_matkul_absen', $kode_mk)->where('npm_absen', $npm)->where('status', 'izin')->count();
                  $sakit = DB::table('absensi')->where('nip_absen', $dsn->nip)->where('kd_matkul_absen', $kode_mk)->where('npm_absen', $npm)->where('status', 'sakit')->count();
                  $alfa = DB::table('absensi')->where('nip_absen', $dsn->nip)->where('kd_matkul_absen', $kode_mk)->where('npm_absen', $npm)->where('status', 'alfa')->count();
                } else {
                  $masuk = 0; $izin = 0; $sakit = 0; $alfa = 0;
                }
                @endphp
                @if ($masuk != 0 || $izin != 0 || $sakit != 0 || $alfa != 0)
                  <tr>
                    <td>{{$mhs->nama}}</td>
                    <td>{{$mk->matkul}}</td>
                    <td>{{$dsn->nama}}</td>
                    <td>{{DB::table('absensi')->where('nip_absen', $dsn->nip)->where('kd_matkul_absen', $kode_mk)->where('npm_absen', $npm)->where('status', 'masuk')->count()}}</td>
                    <td>{{DB::table('absensi')->where('nip_absen', $dsn->nip)->where('kd_matkul_absen', $kode_mk)->where('npm_absen', $npm)->where('status', 'izin')->count()}}</td>
                    <td>{{DB::table('absensi')->where('nip_absen', $dsn->nip)->where('kd_matkul_absen', $kode_mk)->where('npm_absen', $npm)->where('status', 'sakit')->count()}}</td>
                    <td>{{DB::table('absensi')->where('nip_absen', $dsn->nip)->where('kd_matkul_absen', $kode_mk)->where('npm_absen', $npm)->where('status', 'alfa')->count()}}</td>
                  </tr>
                @endif
              @endforeach
            @endforeach
          @endforeach
          <tfoot>
            <thead>
              <th colspan="3">Total : </th>
              <th>{{DB::table('absensi')->where('status', 'masuk')->count()}}</th>
              <th>{{DB::table('absensi')->where('status', 'izin')->count()}}</th>
              <th>{{DB::table('absensi')->where('status', 'sakit')->count()}}</th>
              <th>{{DB::table('absensi')->where('status', 'alfa')->count()}}</th>
            </thead>
          </tfoot>
        </table>
  </div>
</div>
@endsection
