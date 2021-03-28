<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_ktp extends Model
{
    //
    protected $table = 'data_ktps';

    protected $fillable = ['nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'agama', 'status', 'pekerjaan', 'warga_negara', 'foto'];

}
