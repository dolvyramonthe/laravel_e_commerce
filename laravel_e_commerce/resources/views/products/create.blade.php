@extends('layouts.header')

@section('content')

    <style>
         label:nth-child(n+4),
        input:nth-child(n+4),
        textarea:nth-child(n+4) {
            margin-top: 40px; 
        }
    </style>
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
@endsection

