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

        <label for="poppings">Poppings:</label>
        <input type="text" name="poppings" value="{{ $product->poppings }}">

        <label for="sugar_quantity">Quantité de sucre:</label>
        <input type="number" name="sugar_quantity" value="{{ $product->sugar_quantity }}">

        <label for="size">Taille :</label>
        <input type="text" name="size" value="{{ $product->size ?? '' }}" required>

        <button type="submit">Update the product</button>
    </form>
@endsection


