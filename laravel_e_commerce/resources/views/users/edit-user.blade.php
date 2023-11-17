@extends('layouts.header')

@section('content')
    <div>
        @auth
            <h1 style="font-size: 24px; color: #fff; margin-bottom: 20px;">Edit User</h1>
            <form method="POST" action="{{ route('users.update', ['id' => $user->id]) }}">
                @csrf
                @method('PUT')

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required>

                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="superadmin" {{ $user->role === 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                </select>

                <label for="isActive">Active:</label>
                <select id="isActive" name="isActive" required>
                    <option value="1" {{ $user->isActive ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$user->isActive ? 'selected' : '' }}>Inactive</option>
                </select>

                <button type="submit">Update User</button>
            </form>
        @endauth
    </div>
@endsection
