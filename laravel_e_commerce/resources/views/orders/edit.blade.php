@extends('layouts.header')

@section('content')
    <div class="container">
        <h2>Edit Order ID: {{ $order->id }}</h2>
        <p>Status: {{ $order->status }}</p>
        <h3>Ordered Products:</h3>
        <ul>
            @foreach($order->products as $product)
                <li>
                    {{ $product->name }} (Quantity: {{ $product->pivot->quantity }},
                    Total Amount: ${{ $product->pivot->total_amount }})
                </li>
            @endforeach
        </ul>

        <h3>Add Products</h3>
        <form method="POST" action="{{ route('orders.addproduct', $order->id) }}">
            @csrf
            @method('PUT')

            <!-- Select products and quantities -->
            <label for="products">Select Products:</label>
            <select id="products" name="products[]" multiple>
                @foreach ($allProducts as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>

            <label for="quantities">Quantities:</label>
            <input type="number" id="quantities" name="quantities[]" min="1" value="1" required>

            <button type="submit">Add Products</button>
        </form>

        <h3>Update Product Quantity or Popings</h3>
        <form method="POST" action="{{ route('orders.update', $order->id) }}">
            @csrf
            @method('PUT')

            <label for="product_id">Select Product:</label>
            <select id="product_id" name="product_id">
                @foreach ($order->products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>

            <label for="sugar_quantity">Sugar Quantity:</label>
            <input type="number" id="sugar_quantity" name="sugar_quantity" min="0" value="0" required>

            <label for="popings">Popings:</label>
            <input type="text" id="popings" name="popings" required>

            <button type="submit">Update Product</button>
        </form>
    </div>
@endsection
