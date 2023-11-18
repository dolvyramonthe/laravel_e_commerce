@extends('layouts.header')

@section('content')

    <style>

        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: gray;
        }

    </style>

    <h1 style="font-size: 24px; color: #fff; margin-bottom: 20px;">Ingredients</h1>

    <!-- Button to add a new ingredient -->
    <a href="{{ route('ingredients.create') }}" style="text-decoration: none; display: block; color: violet; margin-top: 20px; margin-bottom: 20px; font-size: 20px;">Add New Ingredient</a>

    <!-- Display the list of ingredients -->
    @if(count($ingredients) > 0)
        <table>
            <thead>
                <tr style="background-color: #f2f2f2;">
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
                            <a href="{{ route('ingredients.edit', $ingredient->id) }}" style="text-decoration: none; color: blue; margin-right: 10px;">Edit</a>
                            <form method="POST" action="{{ route('ingredients.destroy', $ingredient->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="button"  onclick="confirmDelete({{$ingredient->id}})" style="text-decoration: none; color: red; margin-right: 10px;">Delete</button>
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
