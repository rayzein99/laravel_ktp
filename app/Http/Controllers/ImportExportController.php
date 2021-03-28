<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\Data_ktpExport;
use App\Imports\Data_ktpImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Data_ktp;
use Carbon\Carbon;

class ImportExportController extends Controller
{
    //
    public function importcsv(Request $request){
        // Excel::import(new Data_ktpImport,request()->file('file'));
        Excel::import(new Data_ktpImport, $request->file);
        return redirect('ktp');
    }

    public function exportcsv(){
        return Excel::download(new Data_ktpExport, 'ktp.csv');
    }

    public function exportpdf(){
        return Excel::download(new Data_ktpExport, 'ktp.pdf');
        // $ktp = Data_ktp::all();
        // $pdf = PDF::loadView('ktp', compact('ktp'));
        // return $pdf->download('ktp.pdf');
    }
}
