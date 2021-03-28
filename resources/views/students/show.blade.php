@extends('layout.main')
@section('title', 'Detail Student')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">Detail Student</h1>

                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$student->nama}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$student->nrp}}</h6>
                        <p class="card-text">{{$student->email}}</p>
                        <p class="card-text">{{$student->jurusan}}</p>

                        <a href="{{url('students/'.$student->id)}}/edit"><button type="submit" class="btn btn-primary">Edit</button></a>
                        <form action="{{url('students/'.$student->id)}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{url('students')}}" class="card-link">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
