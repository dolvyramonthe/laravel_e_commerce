@extends('layouts.header')

@section('content')

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf

        <!-- Select products and quantities -->
        <label for="products">Select Products:</label>
        <select id="products" name="products[]" multiple>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>

        <label for="quantities">Quantities:</label>
        <input type="number" id="quantities" name="quantities[]" min="1" value="1" required>

        <!-- Other order details -->
        <!-- ... -->

        <button type="submit">Create Order</button>
    </form>
@endsection
