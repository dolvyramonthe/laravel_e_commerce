@extends('layouts.header')

@section('content')
    <h1>Add New Ingredient</h1>

    <!-- Form to create a new ingredient -->
    <form method="POST" action="{{ route('ingredients.store') }}">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <!-- Submit button -->
        <button type="submit">Create Ingredient</button>
    </form>
@endsection
