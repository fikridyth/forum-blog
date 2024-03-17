@extends('layouts.main')

@section('container')
    @auth
        <h1>Welcome back, {{ auth()->user()->name }}</h1>
        <hr>
        <ul class="mt-5">
            <li>
                <h3><a href="/posts" class="text-decoration-none">See Posts</a></h3>
            </li>
            <li>
                <h3 class="mt-3"><a href="/dashboard/posts" class="text-decoration-none">Make A Post</a></h3>
            </li>
        </ul>
    @else
        <h1>Welcome, Stranger</h1>
    @endauth
@endsection
