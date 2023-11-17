@extends('layouts.header')

@section('content')

    <style>

        h1{
            text-align: center;
        }
        form {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        label[for="role"] {
            margin-bottom: 5px;
        }

        input[type="password"],
        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .add-admin button[type="submit"] {
            padding: 8px 16px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-admin button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <div class="add-admin">
        @auth
            <h1 style="font-size: 24px; color: #fff; margin-bottom: 20px;">Create New User</h1>
            <form method="POST" action="{{ route('addadmin.add') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="superadmin">Superadmin</option>
                </select>

                <button type="submit">Create User</button>
            </form>
        @endauth
    </div>
@endsection
