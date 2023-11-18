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
                    {{ $product->name }} (Quantity: {{ $product->pivot->quantity }}, Total Amount: {{ $product->pivot->total_amount }})
                </li>
            @endforeach
        </ul>

        <a href="{{ route('orders.index') }}" class="btn btn-primary">Back to Orders</a>
    </div>
@endsection
