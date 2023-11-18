@extends('layouts.header')

@section('content')
    <div class="Profile-form">
        @auth
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h1 style="color: #fff; font-family: Arial;">User Profile</h1>
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>

                    <label for="avatar">Profile Picture:</label>
                    <input type="file" id="avatar" name="avatar" accept="image/*">

                    @if(auth()->user()->avatar)
                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Profile Picture" style="max-width: 100px; max-height: 100px;">
                    @endif
                </div>

                <button type="submit">Update Profile</button>
            </form>
        @endauth
    </div>

    <style>
        .alert-success {
            color: green;
        }

        .Profile-form {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input[type="text"],
        input[type="email"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .Profile-form button[type="submit"] {
            padding: 8px 16px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .Profile-form button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
@endsection
