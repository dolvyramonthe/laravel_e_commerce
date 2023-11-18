@extends('layouts.header')

@section('content')

    <style>

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        li img {
            max-width: 30px;
            max-height: 30px;
            margin-right: 10px;
        }
    </style>
    <div class="admin-section">
        @auth
            <h1>Welcome, {{ auth()->user()->name }}!</h1>
            <div class="user-avatar">
                @if(auth()->user()->avatar)
                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="User Avatar" style="max-width: 100px; max-height: 100px;">
                @endif
            </div>
            <p>Manage your profile:</p>
            <ul>

                <li>
                <img src="https://cdn5.vectorstock.com/i/1000x1000/20/14/update-male-profile-vector-11592014.jpg" alt="update profile">
                    <a href="{{ route('profile') }}" style="color: red">Update Profile</a>
                </li>

                <li>
                <img src="https://icons.veryicon.com/png/o/miscellaneous/online-office-business-processing-icon/change-password-27.png" alt="update password">
                    <a href="{{ route('password') }}" style="color: red">Update Password</a>
                </li>

                <li>
                <img src="https://cdn-icons-png.flaticon.com/512/3875/3875970.png" alt="products management">
                    <a href="{{ route('products.index') }}" style="color: blue">Products Management</a>
                </li>

                <li>
                <img src="https://cdn-icons-png.flaticon.com/512/2770/2770013.png" alt="ingredients management">
                    <a href="{{ route('ingredients.index') }}" style="color: blue">Ingredients Management</a>
                </li>

            </ul>
        @endauth
    </div>
@endsection
