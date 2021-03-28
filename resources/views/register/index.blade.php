@extends('layout.main')
@section('title', 'Daftar User Baru')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="mt-3">Daftar User Baru</h1>

                <form method="post" action="{{url('register')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Username" name="name" value="{{old('name')}}">
                        @error('name') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Masukkan Email" name="email" value="{{old('email')}}">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        @error('email') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label @error('password') is-invalid @enderror">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password">
                        @error('password') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Daftar</button>
                    <a class="btn btn-primary" href="{{ url('/login')}}" role="button">Login</a>
                </form>
            </div>
        </div>
    </div>
@endsection
