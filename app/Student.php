<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    // menyimpan dengan cara ke dua (Student::create(['name' => 'Flight 10']);)
    protected $fillable = ['nama','nrp','email','jurusan']; //yang boleh diisi
    // protected $guarded = ['id']; //yang tidak boleh diisi
}
