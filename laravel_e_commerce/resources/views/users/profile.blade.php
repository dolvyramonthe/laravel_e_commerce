@extends('layouts.header')

@section('content')
    <div class="Profile-form">
        @auth
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h1>User Profile</h1>
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
@endsection
