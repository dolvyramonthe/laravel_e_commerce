@extends('layouts.header')

@section('content')

    <style>

        label{
            margin: 10px;
            margin-bottom: 40px;
        }

        label:nth-child(n+4),
        input:nth-child(n+4),
        textarea:nth-child(n+4) {
            margin-top: 40px; 
        }
    </style>
    <div>
        @auth
            <h1 style="font-size: 24px; color: #fff; margin-bottom: 20px;">Edit product</h1>

            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="name">Product name:</label>
                <input type="text" name="name" value="{{ $product->name }}" required>

                <label for="desc">Description:</label>
                <textarea name="desc" required>{{ $product->desc }}</textarea>

                <label for="price">Price:</label>
                <input type="number" name="price" step="0.01" value="{{ $product->price }}" required>

                <label for="poppings">Poppings:</label>
                <input type="text" name="poppings" value="{{ $product->poppings }}">

                <label for="sugar_quantity">Sugar:</label>
                <input type="number" name="sugar_quantity" value="{{ $product->sugar_quantity }}">

                <label for="size">Size:</label>
                <input type="text" name="size" value="{{ $product->size ?? '' }}" required>

                <button type="submit">Update the product</button>
            </form>
        @endauth
    </div>
@endsection


