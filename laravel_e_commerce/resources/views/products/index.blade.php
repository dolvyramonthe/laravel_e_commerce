@extends('layouts.header')

@section('content')

    <style>

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: gray;
        }

    </style>
    <div>
        @auth
        <h1 style="font-size: 24px; color: #fff; margin-bottom: 20px;">List Products</h1>
            <table>
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Availability</th>
                        <th>Poppings</th>
                        <th>Sugar Quantity</th>
                        <th>Size</th>
                        <th>Product Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->desc }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->is_available === 1 ? "Available" : "Not Available" }}</td>
                            <td>{{ $product->poppings }}</td>
                            <td>{{ $product->sugar_quantity }}</td>
                            <td>{{ $product->size }}</td>
                            <td>
                                @if ($product->image_path)
                                    <a href="{{ asset('storage/' . $product->image_path) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="max-width: 200px; max-height: 200px;">
                                    </a>
                                @else
                                    <p>No image available</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" style="text-decoration: none; color: blue; margin-right: 10px;">Update</a>
                                <form id="delete-form-{{ $product->id }}" method="POST" action="{{ route('products.destroy', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete({{ $product->id }})" style="text-decoration: none; color: red; margin-right: 10px;">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('products.create') }}" style="text-decoration: none; display: block; color: violet; margin-top: 20px; font-size: 20px;">Add +</a>
        @endauth
    </div>
    <script>
        function confirmDelete(productId) {
            if (confirm('Are you sure you want to delete this product?')) {
                document.getElementById('delete-form-' + productId).submit();
            }
        }
    </script>
@endsection


