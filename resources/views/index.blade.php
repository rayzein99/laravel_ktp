@extends('layout.main')
@section('title', 'Data KTP')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1 class="mt-3">Data KTP</h1>

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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{url('/exportcsv')}}" class="btn btn-success">Export CSV</a>
                <a href="{{url('/exportpdf')}}" class="btn btn-success">Export PDF</a>
            </div>
        </div>
    </div>
@endsection
