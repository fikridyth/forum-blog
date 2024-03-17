@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">About Me</h1>
    </div>

    <h6>Name: {{ auth()->user()->name }}</h6>
    <h6>ID: {{ auth()->user()->id }}</h6>
    <h6>Username: {{ auth()->user()->username }}</h6>
    <h6>Email: {{ auth()->user()->email }}</h6>
@endsection
