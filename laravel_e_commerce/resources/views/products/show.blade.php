@extends('layouts.header')

@section('content')
    <h1>Détails A Product</h1>

    <h2>{{ $product->name }}</h2>
    <p>{{ $product->desc }}</p>
    <p>Prix : {{ $product->price }} €</p>
    <p>Disponibilité : {{ $product->is_available ? 'Disponible' : 'Indisponible' }}</p>
    @if ($product->image_path)
        <img src="{{ $product->image_path }}" alt="{{ $product->name }}" style="max-width: 200px; max-height: 200px;">
    @else
        <p>No image available</p>
    @endif

    
    <a href="{{ route('products.edit', $product->id) }}">Modifier le Produit</a>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete a product</button>
    </form>

    <a href="{{ route('products.index') }}">Return to the list of products</a>
@endsection
