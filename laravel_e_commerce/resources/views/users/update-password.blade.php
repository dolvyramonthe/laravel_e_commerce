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
            <h1>Update Password</h1>
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
@endsection
