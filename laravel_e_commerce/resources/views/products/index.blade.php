@extends('layouts.header')

@section('content')
    <h1>Product List</h1>

    @foreach($products as $product)
        <div>
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->desc }}</p>
            <p>Prix : {{ $product->price }} €</p>
            <p>Disponibilité : {{ $product->is_available ? 'Disponible' : 'Indisponible' }}</p>

            <a href="{{ route('products.show', $product->id) }}">Voir les détails</a>

            @if ($product->image_path)
                <a href="{{ asset('storage/' . $product->image_path) }}" target="_blank">
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="max-width: 200px; max-height: 200px;">
                </a>
            @else
                <p>Aucune image disponible</p>
            @endif
        </div>
    @endforeach
@endsection
