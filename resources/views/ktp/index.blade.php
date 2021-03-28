@extends('layout.main')
@section('title', 'Data KTP')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1 class="mt-3">Data KTP</h1>

                <a href="{{url('/ktp/create')}}" class="btn btn-primary my-3">Tambah Data</a>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr
                            <?php
                            if($row->id % 2 == 0)
                                echo "class=table-light";
                            ?>
                        >
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$row->nama}}</td>
                            <td>{{$row->nik}}</td>
                            <td>{{$row->alamat}}</td>
                            <td>{{$row->tanggal_lahir}}</td>
                            <td>{{$row->umur}}</td>
                            <td>
                                <a href="{{url('/ktp/'.$row->id)}}"><span class="btn btn-info btn-sm">Lihat</span></a>
                                <a href="{{url('/ktp/'.$row->id)}}/edit"><span class="btn btn-success btn-sm">Ubah</span></a>
                                <form action="{{url('/ktp/'.$row->id)}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{url('/exportcsv')}}" class="btn btn-success">Export CSV</a>
                <a href="{{url('/exportpdf')}}" class="btn btn-success">Export PDF</a>

            <form method="post" action="{{url('/importcsv')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label @error('file') is-invalid @enderror">File Import</label>
                    <input class="form-control" type="file" id="file" name="file">
                    @error('file') <div class="invalid-feedback">{{$message}}</div> @enderror
                    <button type="submit" class="btn btn-primary">Import CSV</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
