@extends('layouts.header')

@section('content')
    <div>
        @auth
            <h1>Welcome, {{ auth()->user()->name }}!</h1>
        @else
            <h1>Welcome to the user page</h1>
            <p>Manage your profile:</p>
            <ul>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            </ul>
        @endauth
    </div>
@endsection
