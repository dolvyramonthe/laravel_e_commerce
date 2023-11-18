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
                            <a href="{{ route('ingredients.edit', $ingredient->id) }}">Update</a>
                            {{-- <form method="POST" action="{{ route('ingredients.destroy', $ingredient->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete({{ $ingredient->id }})">Delete</button>
                            </form> --}}
                            <form id="delete-form-{{ $ingredient->id }}" method="POST" action="{{ route('ingredients.destroy', $ingredient->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete({{ $ingredient->id }})" style="text-decoration: none; color: red; margin-right: 10px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No ingredients found.</p>
    @endif

    <script>
        function confirmDelete(ingredientId) {
            if (confirm('Are you sure you want to delete this ingredient?')) {
                document.getElementById('delete-form-' + ingredientId).submit();
            }
        }
    </script>
@endsection
