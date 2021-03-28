<?php

namespace App\Exports;

use App\Data_ktp;
use Maatwebsite\Excel\Concerns\FromCollection;

class Data_ktpExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data_ktp::all();
    }
}
