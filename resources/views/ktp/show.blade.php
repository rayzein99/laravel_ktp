@extends('layout.main')
@section('title', 'Detail KTP')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">Detail KTP</h1>

                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>{{$data_ktp->nama}}</td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>{{$data_ktp->nik}}</td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>{{$data_ktp->tempat_lahir}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>{{$data_ktp->tanggal_lahir}}</td>
                        </tr>
                        <tr>
                            <td>Umur</td>
                            <td>{{$data_ktp->umur}}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>{{$data_ktp->jenis_kelamin}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{$data_ktp->alamat}}</td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>{{$data_ktp->agama}}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>{{$data_ktp->status}}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>{{$data_ktp->pekerjaan}}</td>
                        </tr>
                        <tr>
                            <td>Warga Negara</td>
                            <td>{{$data_ktp->warga_negara}}</td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td><img src="{{asset('/assets/ktp/'.$data_ktp->foto)}}" class="img-thumbnail" alt="foto"></td>
                        </tr>
                    </tbody>
                </table>

                <a href="{{url('/ktp/'.$data_ktp->id)}}/edit"><button type="submit" class="btn btn-primary">Ubah</button></a>
                <form action="{{url('/ktp/'.$data_ktp->id)}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
                <a href="{{url('/ktp')}}" class="btn btn-success">Kembali</a>
            </div>
        </div>
    </div>
@endsection
