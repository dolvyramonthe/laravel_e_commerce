@extends('layouts.header')

@section('content')
    <div>
        @auth
            <h1>Create New User</h1>
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
