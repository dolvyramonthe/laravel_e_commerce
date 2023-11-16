@extends('layouts.header')

@section('content')
    <h1>Liste des Produits</h1>

    @foreach($products as $product)
        <div>
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->desc }}</p>
            <p>Prix : {{ $product->price }} €</p>
            <p>Disponibilité : {{ $product->is_available ? 'Disponible' : 'Indisponible' }}</p>
            <p>Poppings : {{ $product->poppings }}</p>
            <p>Quantité de sucre : {{ $product->sugar_quantity }}</p>
            <p>Taille : {{ $product->size }}</p>

            <a href="{{ route('products.show', $product->id) }}">see details</a>

            @if ($product->image_path)
                <a href="{{ asset('storage/' . $product->image_path) }}" target="_blank">
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="max-width: 200px; max-height: 200px;">
                </a>
            @else
                <p>No image available</p>
            @endif
        </div>
    @endforeach
@endsection

