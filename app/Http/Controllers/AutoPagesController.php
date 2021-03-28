<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_ktp;
use Carbon\Carbon;

class AutoPagesController extends Controller
{
    //
    public function index(){
        $data = Data_ktp::all();
        foreach($data as $row){
            $now = Carbon::now(); // Tanggal sekarang
            $b_day = Carbon::parse($row->tanggal_lahir); // Tanggal Lahir
            $age = $b_day->diffInYears($now);  // Menghitung umur
            $row->umur = $age;
        }
        // dd($data);
        return view('index', compact('data'));
    }
    public function about(){
        return view('about', ['nama' => 'Ryan with auto generate']);
    }
}
