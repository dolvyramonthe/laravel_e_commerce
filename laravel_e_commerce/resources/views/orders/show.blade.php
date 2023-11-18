@extends('layouts.header')

@section('content')

    <style>
         li {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
    </style>
    <div class="container">
        <h1 style="font-size: 24px; color: #fff; margin-bottom: 20px;">Order Details - ID: {{ $order->id }}</h1>
        <p style="font-size: 24px; color: #333; margin-bottom: 20px;">Status: {{ $order->status }}</p>
        <p style="font-size: 24px; color: #333; margin-bottom: 20px;">Total Amount: {{ $order->total_amount }}</p>

        <h2 style="font-size: 24px; color: #fff; margin-bottom: 20px;">Ordered Products</h2>
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
                        <p style="font-size: 24px; color: #fff; margin-bottom: 20px;">No image available</p>
                    @endif
                </li>
            @endforeach
        </ul>

        <a href="{{ route('orders.index') }}" class="btn btn-primary" style="text-decoration: none; display: block; color: violet; margin-top: 20px; font-size: 20px;">Back to Orders</a>
    </div>
@endsection
