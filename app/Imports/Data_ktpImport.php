<?php

namespace App\Imports;

use App\Data_ktp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;

class Data_ktpImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Data_ktp([
            //
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => new Carbon($row['tanggal_lahir']),
            // 'tanggal_lahir' => Date::excelToDateTimeObject($row['tanggal_lahir']),
            // 'tanggal_lahir' => strtotime(date_format($row['tanggal_lahir'], "Y-m-d")),
            // 'tanggal_lahir' => date($row['tanggal_lahir']),
            'jenis_kelamin' => $row['jenis_kelamin'],
            'alamat' => $row['alamat'],
            'agama' => $row['agama'],
            'status' => $row['status'],
            'pekerjaan' => $row['pekerjaan'],
            'warga_negara' => $row['warga_negara'],
        ]);
    }
}
