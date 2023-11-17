@extends('layouts.header')

@section('content')
    <h1>Edit Ingredient - {{ $ingredient->name }}</h1>

    <!-- Form to update an existing ingredient -->
    <form method="POST" action="{{ route('ingredients.update', $ingredient->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $ingredient->name }}" required>
        </div>

        <!-- Submit button -->
        <button type="submit">Update Ingredient</button>
    </form>
@endsection
