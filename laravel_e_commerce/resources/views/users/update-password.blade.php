@extends('layouts.header')

@section('content')
    <div class="update-password-form">
        @auth
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 style="color: #fff; font-family: Arial;">Update Password</h1>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')

                <label for="current_password">Current Password:</label>
                <input type="password" id="current_password" name="current_password" required>

                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>

                <label for="new_password_confirmation">Confirm New Password:</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>

                <button type="submit">Update Password</button>
            </form>
        @endauth
    </div>

    <style>
        .alert-success {
            color: green;
        }

        .alert-danger {
            color: red;
        }

        .update-password-form {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        .update-password-form label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .update-password-form input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .update-password-form button[type="submit"] {
            padding: 8px 16px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .update-password-form button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
@endsection
