@extends('layouts.header')

@section('content')

    <style>

        .container {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        .product-field label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .container button[type="submit"] {
            padding: 8px 16px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .container button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <div class="container">
        <h1 style="font-size: 24px; color: #fff; margin-bottom: 20px;">Create New Order</h1>

        <form method="POST" action="{{ route('orders.store') }}">
            @csrf

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
