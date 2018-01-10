@extends('layouts.master')

@section('judul')
  Sistem Absensi Dari Dosen
@endsection

@section('list')
  <li class="active"><a href="/">Beranda</a></li>
  <li><a href="/absen">Absen</a></li>
  <li><a href="/hitungabsensi">Hitung Absen</a></li>
  <li><a href="/deleteabsen">Delete Absen</a></li>
@endsection

@section('isinya')
  <div class="container">
    <div class="row">
      <h1 class="page-header"> <b>AbsenKu</b> <br><small></small></h1>
          <a class="btn btn-success btn-block" href="/absen">Absen</a> <br> <br>
          <a class="btn btn-info btn-block" href="/hitungabsensi">Hitung Absensi</a> <br> <br>
          <a class="btn btn-danger btn-block" href="/deleteabsen">Delete Semua Absen</a> <br> <br>
    </div>
  </div>

  <div class="container">
  <div class="row">
    <div class="col-md-12">
      @if($errors->any())
        <div class="alert alert-success">>
            <h4>{{$errors->first()}}</h4>
        </div>
      @endif
    </div>
  </div>
  </div>

  <div class="" style="margin-top:143px;">

  </div>
@endsection
