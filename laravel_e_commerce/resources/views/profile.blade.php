@extends('layouts.header')

@section('content')
    <div class="Profile-form">
        <h1>User Profile</h1>
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <!-- Input fields for profile information -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>
            </div>
            <!-- Additional fields as needed -->

            <button type="submit">Update Profile</button>
        </form>
    </div>
@endsection
