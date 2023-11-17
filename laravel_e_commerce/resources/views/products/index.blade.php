@extends('layouts.header')

@section('content')
    <div>
        @auth
        <h1>Liste des Produits</h1>
            <table>
                <thead>
                    <tr>
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
                                <a href="{{ route('products.edit', $product->id) }}">Update</a>
                                <form id="delete-form-{{ $product->id }}" method="POST" action="{{ route('products.destroy', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete({{ $product->id }})">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('products.create') }}">+</a>
        @endauth
    </div>

    <script>
        function confirmDelete(userId) {
            if (confirm('Are you sure you want to delete this user?')) {
                document.getElementById('delete-form-' + userId).submit();
            }
        }
    </script>
@endsection


