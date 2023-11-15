@extends('layouts.header')

@section('content')
    <div>
        @auth
            <h1>Welcome, {{ auth()->user()->name }}!</h1>
            <li><a href="{{ route('products.create') }}">Add Product</a></li>
        @else
            <ul>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            </ul>
        @endauth
    </div>
@endsection
