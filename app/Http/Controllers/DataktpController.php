<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_ktp;
use Carbon\Carbon;

class DataktpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Data_ktp::all();
        foreach($data as $row){
            $now = Carbon::now(); // Tanggal sekarang
            $b_day = Carbon::parse($row->tanggal_lahir); // Tanggal Lahir
            $age = $b_day->diffInYears($now);  // Menghitung umur
            $row->umur = $age;
        }
        // dd($data);
        return view('ktp.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ktp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required|max:255',
            'nik' => 'required|unique:data_ktps|numeric',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required|max:1',
            'alamat' => 'required|max:255',
            'agama' => 'required|max:255',
            'status' => 'required|max:255',
            'pekerjaan' => 'required|max:255',
            'warga_negara' => 'required|max:255',
            'foto' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        //cara ketiga
        $ktp = new Data_ktp;
        $ktp->nama = $request->nama;
        $ktp->nik = $request->nik;
        $ktp->tempat_lahir = $request->tempat_lahir;
        $ktp->tanggal_lahir = $request->tanggal_lahir;
        $ktp->jenis_kelamin = $request->jenis_kelamin;
        $ktp->alamat = $request->alamat;
        $ktp->agama = $request->agama;
        $ktp->status = $request->status;
        $ktp->pekerjaan = $request->pekerjaan;
        $ktp->warga_negara = $request->warga_negara;

        $fileName = time().'.'.$request->foto->extension();
        $ktp->foto = $fileName;
        $path = '/assets/ktp/';
        $request->foto->move(public_path($path), $fileName); //upload image
        $ktp->save();
        return redirect('/ktp')->with('status', 'Data '.$request->nama.' successful added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Data_ktp::findOrFail($id);
        $now = Carbon::now(); // Tanggal sekarang
        $b_day = Carbon::parse($data->tanggal_lahir); // Tanggal Lahir
        $age = $b_day->diffInYears($now);  // Menghitung umur
        $data->umur = $age;
        return view('ktp.show', ['data_ktp' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('ktp.edit', ['data_ktp' => Data_ktp::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required|max:1',
            'alamat' => 'required|max:255',
            'agama' => 'required|max:255',
            'status' => 'required|max:255',
            'pekerjaan' => 'required|max:255',
            'warga_negara' => 'required|max:255',
            'foto' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = Data_ktp::findOrFail($id);
        $foto = $data->foto;
        $path = 'assets/ktp/';
        if($request->foto != null){
            $file = public_path($path).$foto;
            @unlink($file);
            $foto = time().'.'.$request->foto->extension();
            $request->foto->move(public_path($path), $foto); //upload image
        }

        if($data->nik != $request->nik){
            $request->validate([
                'nik' => 'required|unique:data_ktps|numeric',
            ]);

            Data_ktp::where('id', $id)
                ->update([
                    'nik' => $request->nik,
                ]);
        }

        Data_ktp::where('id', $id)
            ->update([
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'status' => $request->status,
                'pekerjaan' => $request->pekerjaan,
                'warga_negara' => $request->warga_negara,
                'foto' => $foto,
            ]);

        return redirect('/ktp')->with('status', 'Data '.$request->nama.' successful updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Data_ktp::findOrFail($id);
        $foto = $data->foto;
        $path = 'assets/ktp/';
        $file = public_path($path).$foto;
        @unlink($file);

        Data_ktp::destroy($id);
        return redirect('/ktp')->with('status', 'Data '.$data->nama.' successful deleted!');
    }
}
