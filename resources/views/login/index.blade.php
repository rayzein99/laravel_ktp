@extends('layout.main')
@section('title', 'Halaman Login')

@section('container')
    <div class="container col-3">
        <br />

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

    <form action="{{url('/login')}}" method="post" class="d-inline">
        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Username</span>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            @error('name') <div class="invalid-feedback">{{$message}}</div> @enderror
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Password</span>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
            @error('password') <div class="invalid-feedback">{{$message}}</div> @enderror
        </div>

        <div class="input-group mb-3">
                <button type="submit" class="btn btn-primary btn-sm">Login</button>
        </div>
    </form>

        <div class="input-group mb-3">
            <div>Belum ada akun? <a href="{{url('register/')}}">Register</a></div>
        </div>
    </div>
@endsection
