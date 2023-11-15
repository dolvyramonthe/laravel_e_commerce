@extends('layouts.header')

@section('content')
    <h1>create a product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <label for="name">Nom du produit :</label>
        <input type="text" name="name" required>

        <label for="desc">Description :</label>
        <textarea name="desc" required></textarea>

        <label for="price">Prix :</label>
        <input type="number" name="price" step="0.01" required>

        <label for="image">Image :</label>
        <input type="file" name="image" required>

        <label for="is_available">Disponibilité :</label>
        <input type="checkbox" name="is_available" value="1" checked>


        <button type="submit">Create a product</button>
    </form>
@endsection