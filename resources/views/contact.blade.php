@extends('layouts.main')

@section('container')
    <h1>Contact Me If You Have Question</h1>
    <hr>
    <h3 class="mt-5">{{ $name }}</h3>
    <p class="mt-3">Email: {{ $email }}</p>
    <p>No: {{ $no }}</p>
    <img src="img/{{ $image }}" alt="{{ $name }}" width="200" class="img-thumbnail rounded-circle">
@endsection
