@extends('layout.main')
@section('title', 'List of Students')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1 class="mt-3">List of Students</h1>

                <a href="{{url('/students/create')}}" class="btn btn-primary my-3">Add Student</a>

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
                            <th scope="col">NRP</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $mhs)
                        <tr
                            <?php
                            if($mhs->id % 2 == 0)
                                echo "class=table-light";
                            ?>
                        >
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$mhs->nama}}</td>
                            <td>{{$mhs->nrp}}</td>
                            <td>{{$mhs->email}}</td>
                            <td>{{$mhs->jurusan}}</td>
                            <td>
                                <a href="{{url('/students/'.$mhs->id)}}"><span class="btn btn-info btn-sm">View</span></a>
                                <a href="{{url('/students/'.$mhs->id)}}/edit"><span class="btn btn-success btn-sm">Edit</span></a>
                                <form action="{{url('students/'.$mhs->id)}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
