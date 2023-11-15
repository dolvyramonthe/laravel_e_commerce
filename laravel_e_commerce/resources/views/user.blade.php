@extends('layouts.header')

@section('content')
    <div>
        @auth
            <h1>Welcome, {{ auth()->user()->name }}!</h1>
            <p>Manage your profile:</p>
            <ul>
                <li><a href="{{ route('profile') }}">Update Profile</a></li>
                <li><a href="{{ route('password') }}">Update Password</a></li>
            </ul>
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
