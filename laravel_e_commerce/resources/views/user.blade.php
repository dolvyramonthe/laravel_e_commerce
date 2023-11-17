@extends('layouts.header')

@section('content')
    <div class="user-section">
        @auth
            <h1>Welcome, {{ auth()->user()->name }}!</h1>
            <div class="user-avatar">
                @if(auth()->user()->avatar)
                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="User Avatar" style="max-width: 100px; max-height: 100px;">
                @endif
            </div>
            <p>Manage your profile:</p>
            <ul>
                <li><a href="{{ route('profile') }}">Update Profile</a></li>
                <li><a href="{{ route('password') }}">Update Password</a></li>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
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
