@extends('layouts.header')

@section('content')
    <div>
        <h1>Create New User</h1>
        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Input fields for user information -->
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

            <!-- Avatar upload -->
            <label for="avatar">Avatar:</label>
            <input type="file" id="avatar" name="avatar" accept="image/*">

            <button type="submit">Create User</button>
        </form>
    </div>
@endsection
