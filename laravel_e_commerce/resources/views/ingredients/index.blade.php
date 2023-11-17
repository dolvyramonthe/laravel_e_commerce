@extends('layouts.header')

@section('content')
    <h1>Ingredients</h1>

    <!-- Button to add a new ingredient -->
    <a href="{{ route('ingredients.create') }}">Add New Ingredient</a>

    <!-- Display the list of ingredients -->
    @if(count($ingredients) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ingredients as $ingredient)
                    <tr>
                        <td>{{ $ingredient->id }}</td>
                        <td>{{ $ingredient->name }}</td>
                        <td>
                            <!-- Links to edit and delete ingredients -->
                            <a href="{{ route('ingredients.edit', $ingredient->id) }}">Edit</a>
                            <form method="POST" action="{{ route('ingredients.destroy', $ingredient->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No ingredients found.</p>
    @endif
@endsection
