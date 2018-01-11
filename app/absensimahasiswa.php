<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absensimahasiswa extends Model
{
    //pertama buat supaya input, itu ga bisa mass asignment
    //buat specify class model absensimahasiswa -> tabel absensi dari database kita yg di env
    protected $table = 'absensi';
    //created_at updated_at, laravel default nya true,
    public $timestamps = false;
}
