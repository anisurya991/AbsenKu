<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Absensi {{$namamhs}}</title>
    <style media="screen">
    html {
      position: relative;
      min-height: 100%;
    }
    body {
      /* Margin bottom by footer height */
      margin-bottom: 60px;
    }
    .footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 60px; /* Set the fixed height of the footer here */
    line-height: 60px; /* Vertically center the text there */
    background-color: #6a6a6a;
    }

    .colornya {
      color: rgb(255, 255, 255);
    }

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    table, td, th {
      border: 1px solid #000000;
    }

    th, td {
      padding: 15px;
    }

    th {
      color: #ffffff;
      background-color: #2c3e50;
    }
    tr:nth-child(odd) {
      background-color: #ffffff;
    }
    tr:nth-child(even) {
      background-color: #dddddd;
    }
    .konten-kita {
      margin-top: 150px;
      padding-left: 25px;
      padding-right: 25px;
    }

    </style>
  </head>
  <body>
    <h1 class="page-header">Absensi {{$namamhs}}
      <br>
      <small>
         Kode Matkul : {{$kode_mk}} <br>
         Kode Dosen : {{$dosen}}
      </small>
    </h1>
    <table>
      <tr>
        <th>Nama Mahasiswa</th>
        <th>Masuk</th>
        <th>Izin</th>
        <th>Sakit</th>
        <th>Alfa</th>
      </tr>
      <tr>
        <td>{{$namamhs}}</td>
        <td>{{$masuk}}</td>
        <td>{{$izin}}</td>
        <td>{{$sakit}}</td>
        <td>{{$alfa}}</td>
      </tr>
    </table>
  </body>
</html>
