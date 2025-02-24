@extends('layouts.appppp')

@section('content')
    <h1 class="display-4">Home page</h1>
    <p class="lead">Ini adalah halaman Home Page</p>
    <p>Nama : {{ $name }}</p>
    <p>Mata Pelajaran</p>
    <ul>
        @foreach ($lesson as $l)
            <li>{{ $l }}</li>
        @endforeach
    </ul>
@endsection
