@extends('layouts.header')

@section('content')

    <style>

        .edit-product {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        .edit-product label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .edit-product input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .edit-product button[type="submit"] {
            padding: 8px 16px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit-product button[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>
    <div class="edit-product">
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


