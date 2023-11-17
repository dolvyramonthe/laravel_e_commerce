@extends('layouts.header')

@section('content')
    <h1>Détails A Product</h1>

    <h2>{{ $product->name }}</h2>
    <p>{{ $product->desc }}</p>
    <p>Prix : {{ $product->price }} €</p>
    <p>Disponibilité : {{ $product->is_available ? 'Disponible' : 'Indisponible' }}</p>
    <p>Poppings : {{ $product->poppings }}</p>
    <p>Quantité de sucre : {{ $product->sugar_quantity }}</p>
    <p>Taille : {{ $product->size }}</p>

    @if ($product->image_path)
        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="max-width: 200px; max-height: 200px;">
    @else
        <p>No image available</p>
    @endif

    <a href="{{ route('products.edit', $product->id) }}">edit product</a>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete a product</button>
    </form>

    <a href="{{ route('products.index') }}">Return to the list of products</a>
@endsection