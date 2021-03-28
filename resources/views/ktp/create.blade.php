@extends('layout.main')
@section('title', 'Tambah Data KTP')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="mt-3">Tambah Data KTP</h1>

                <form method="post" action="{{url('ktp')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nama" value="{{old('nama')}}">
                        @error('nama') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="Masukkan NIK" name="nik" value="{{old('nik')}}">
                        @error('nik') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" value="{{old('tempat_lahir')}}">
                        @error('tempat_lahir') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
                        @error('tanggal_lahir') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror" aria-label="Default select example" id="jenis_kelamin" name="jenis_kelamin">
                            <option selected>Pilih salah satu</option>
                            <option value="L" @if (old('jenis_kelamin') == "L")
                                selected
                            @endif>Laki-laki</option>
                            <option value="P" @if (old('jenis_kelamin') == "P")
                                selected
                            @endif>Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="3" placeholder="Masukkan Alamat" name="alamat">{{old('alamat')}}</textarea>
                        @error('alamat') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama" placeholder="Masukkan Agama" name="agama" value="{{old('agama')}}">
                        @error('agama') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" placeholder="Masukkan Status" name="status" value="{{old('status')}}">
                        @error('status') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" placeholder="Masukkan Pekerjaan" name="pekerjaan" value="{{old('pekerjaan')}}">
                        @error('pekerjaan') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="warga_negara" class="form-label">Warga Negara</label>
                        <input type="text" class="form-control @error('warga_negara') is-invalid @enderror" id="warga_negara" placeholder="Masukkan Kewarganegaraan" name="warga_negara" value="{{old('warga_negara')}}">
                        @error('warga_negara') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label @error('foto') is-invalid @enderror">Foto</label>
                        <input class="form-control" type="file" id="foto" name="foto">
                        @error('foto') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Tambahkan Data</button>
                    <a href="{{url('/ktp')}}" class="btn btn-success">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
