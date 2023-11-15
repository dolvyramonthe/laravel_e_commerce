@extends('layouts.header')

@section('content')
    <h1>Edit product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="name">Nom du Produit:</label>
        <input type="text" name="name" value="{{ $product->name }}" required>
        
        <label for="desc">Description:</label>
        <textarea name="desc" required>{{ $product->desc }}</textarea>

        <label for="price">Prix:</label>
        <input type="number" name="price" step="0.01" value="{{ $product->price }}" required>


        <button type="submit">Update the product</button>
    </form>
@endsection

