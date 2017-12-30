@extends('layouts.master')

@php
  $mahasiswa = DB::table('mahasiswa')->get();
  $dosen = DB::table('dosen')->get();
  $matkul = DB::table('matakuliah')->get();
@endphp

@section('judul')
  Absensi Mahasiswa
@endsection

@section('list')
  <li><a href="/">Beranda</a></li>
  <li class="active"><a href="/absen">Absen</a></li>
  <li><a href="/hitungabsensi">Hitung Absen</a></li>
  <li><a href="/deleteabsen">Delete Absen</a></li>
@endsection

@section('isinya')
  <div class="container">
  <div class="row">
    <h1 class="page-header">Input Absen</h1>
    <div class="col-md-12">
      @if($errors->any())
        <div class="alert alert-success">>
            <h4>{{$errors->first()}}</h4>
        </div>
      @endif
    </div>
    <form class="" action="{{url(action('AbsenController@PROSESGAN'))}}" method="post">
      {{ csrf_field() }}
      <table>
        <tr>
          <td><label for="">Tanggal : </label></td>
          <td><input type="date" name="tgl"></td>
        </tr>
        <tr>
          <td><label for="">Nama Dosen : </label></td>
          <td>
            <select name="dosen">
              @foreach ($dosen as $dsn)
                <option value="{{$dsn->nip}}">{{$dsn->nama}}</option>
              @endforeach
            </select>
          </td>
        </tr>
        <tr>
          <td><label for="">Nama Matkul : </label></td>
          <td>
            <select name="matkul">
              @foreach ($matkul as $mk)
                <option value="{{$mk->kode_mk}}">{{$mk->matkul}}</option>
              @endforeach
            </select>
          </td>
        </tr>
        <tr>
          <table style="width:100%; text-align:center;" border="1px">
            <thead>
              <td>Nama </td>
              <td>Masuk</td>
              <td>Izin</td>
              <td>Sakit</td>
              <td>alfa</td>
            </thead>
            @foreach ($mahasiswa as $mhs)
              <tr>
              <td>{{$mhs->nama}}</td>
              <td><input type="checkbox" name="status[]" value="{{$mhs->npm}},masuk"></td>
              <td><input type="checkbox" name="status[]" value="{{$mhs->npm}},izin"></td>
              <td><input type="checkbox" name="status[]" value="{{$mhs->npm}},sakit"></td>
              <td><input type="checkbox" name="status[]" value="{{$mhs->npm}},alfa"></td>
              </tr>
            @endforeach
          </table>
        </tr>
      </table>
      <input class="btn btn-danger btn-block" type="submit" name="Masukkan" value="Masukkan">
      </form>
  </div>
  </div>
  <script type="text/javascript">
      // $(':checkbox').on('change',function(){
      //  var th = $(this), name = th.prop('name');
      //  if(th.is(':checked')){
      //      $(':checkbox[name="'  + name + '"]').not($(this)).prop('checked',false);
      //   }
      // });
  </script>
@endsection
