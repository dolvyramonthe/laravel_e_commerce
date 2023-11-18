@extends('layouts.header')

@section('content')
    <div class="container">
        <h1>Create New Order</h1>

        <form method="POST" action="{{ route('orders.store') }}">
            @csrf

            <!-- User Selection (if applicable) -->
            <!-- Add user selection options if orders are associated with users -->
            <div class="form-group">
                <label for="user_id">User:</label>
                <select id="user_id" name="user_id">
                    <!-- Populate with user options if applicable -->
                    <!-- Example: -->
                    <!-- <option value="1">User 1</option> -->
                    <!-- <option value="2">User 2</option> -->
                </select>
            </div>

            <!-- Order Details -->
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" value="pending" required>
            </div>

            <div class="form-group">
                <label for="total_amount">Total Amount:</label>
                <input type="number" id="total_amount" name="total_amount" step="0.01" required>
            </div>

            {{-- <!-- Product Selection -->
            <div class="form-group">
                <label for="products">Products:</label>
                <select id="products" name="products[]" multiple>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div> --}}

            <!-- Add or Remove Products -->
            <div id="product-fields">
                <!-- Initial product selection fields -->
                <div class="product-field">
                    <label for="products">Product:</label>
                    <select class="product-select" name="products[]" multiple>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="remove-product">Remove Product</button>
                </div>
            </div>

            <!-- Ingredient Selection -->
            <div class="form-group">
                <label for="ingredients">Ingredients:</label>
                <select id="ingredients" name="ingredients[]" multiple>
                    @foreach($ingredients as $ingredient)
                        <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantities">Quantities:</label>
                <input type="number" id="quantities" name="quantities[]" min="1" value="1" required>
            </div>

            <!-- Add or Remove Products Button (if applicable) -->
            <!-- Implement buttons to add or remove products from the order -->

            <button type="submit" class="btn btn-primary">Create Order</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addProductBtn = document.getElementById('add-product');
            const productFields = document.getElementById('product-fields');

            addProductBtn.addEventListener('click', function() {
                const productField = document.createElement('div');
                productField.classList.add('product-field');
                productField.innerHTML = `
                    <label for="products">Product:</label>
                    <select class="product-select" name="products[]" multiple>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="remove-product">Remove Product</button>
                `;
                productFields.appendChild(productField);
            });

            productFields.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-product')) {
                    event.target.closest('.product-field').remove();
                }
            });
        });
    </script>
@endsection
