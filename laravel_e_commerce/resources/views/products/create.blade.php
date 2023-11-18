@extends('layouts.header')

@section('content')

    <style>

        .add-product {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        .add-product label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .add-product input[type="text"],
        input[type="number"],
        input[type="file"],
        input[type="checkbox"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .add-product button[type="submit"] {
            padding: 8px 16px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-product button[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>

    <div class="add-product">

        <h1 style="font-size: 24px; color: #fff; margin-bottom: 20px;">Create a product</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <label for="name">Product name:</label>
            <input type="text" name="name" required>

            <label for="desc">Description:</label>
            <textarea name="desc" required></textarea>

            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" required>

            <label for="image">Image:</label>
            <input type="file" name="image" required>

            <label for="poppings">Poppings:</label>
            <input type="text" name="poppings" value="0">

            <label for="size">Size:</label>
            <input type="text" name="size" value="0" required>

            <label for="sugar_quantity">Sugar:</label>
            <input type="number" name="sugar_quantity" value="0">

            <label for="is_available">Disponibility:</label>
            <input type="checkbox" name="is_available" value="1" checked>

        <button type="submit">Create a product</button>
        </form>
    </div>
    
@endsection

