@extends('layouts.header')

@section('content')
    <div class="container">
        <h1>Order Details - ID: {{ $order->id }}</h1>
        <p>Status: {{ $order->status }}</p>
        <p>Total Amount: {{ $order->total_amount }}</p>

        <h2>Ordered Products</h2>
        <ul>
            @foreach ($order->products as $product)
                <li>
                    <h3>{{ $product->name }}</h3>
                </li>

                <li>
                    <p>Description: {{ $product->desc }}</p>
                </li>

                <li>
                    <p>Price: {{ $product->price }}</p>
                </li>

                <li>
                    {{ $product->name }} (Quantity: {{ $product->pivot->quantity }}, Total Amount: {{ $product->pivot->total_amount }})
                </li>

                <li>
                    @if ($product->image_path)
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }} Image">
                    @else
                        <p>No image available</p>
                    @endif
                </li>
            @endforeach
        </ul>

        <a href="{{ route('orders.index') }}" class="btn btn-primary">Back to Orders</a>
    </div>
@endsection
