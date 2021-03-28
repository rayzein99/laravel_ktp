@extends('layout.main')
@section('title', 'Halaman About')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1 class="mt-3">Hello, halaman about!</h1>
                <p>by <?php echo $nama; ?></p>
                <p>by <?= $nama; ?></p>
                <p>by {{$nama}}</p>
            </div>
        </div>
    </div>
@endsection
