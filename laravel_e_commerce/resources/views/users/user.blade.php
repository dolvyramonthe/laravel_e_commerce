@extends('layouts.header')

@section('content')

    <style>

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

        .user-section {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        p {
            margin-bottom: 20px;
        }
    </style>

    <div class="user-section">
        @auth
            <h1 style="color: #fff; font-family: Arial;">Welcome, {{ auth()->user()->name }}!</h1>
            <div class="user-avatar">
                @if(auth()->user()->avatar)
                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="User Avatar" style="max-width: 100px; max-height: 100px;">
                @endif
            </div>
            <p style="font-size: 16px;">Manage your profile:</p>
            <ul style="list-style: none; padding: 0; margin: 0">
                <li>
                    <img src="https://cdn5.vectorstock.com/i/1000x1000/20/14/update-male-profile-vector-11592014.jpg" alt="update profile">
                    <a href="{{ route('profile') }}" style="color: red">Update Profile</a>
                </li>

                <li>
                    <img src="https://icons.veryicon.com/png/o/miscellaneous/online-office-business-processing-icon/change-password-27.png" alt="update password">
                    <a href="{{ route('password') }}" style="color: red">Update Password</a>
                </li>

                <li>
                    <img src="https://as2.ftcdn.net/v2/jpg/03/08/45/53/1000_F_308455353_kNs9gRNlQuWLUwqFMgdmE0HKZy2boWfO.jpg" alt="dashboard">
                    <a href="{{ route('orders.index') }}" style="color: blue">Dashboard</a>
                </li>
            </ul>
        @endauth
    </div>
@endsection
