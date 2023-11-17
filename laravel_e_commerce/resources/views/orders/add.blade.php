@extends('layouts.header')

@section('content')
    <div class="container">
        <h1>Add product</h1>
        <form method="POST" action="{{ route('addorderproduct') }}">
            @csrf
            @method('PUT')

            @if ($data->products->isEmpty())
            <p>No product found.</p>
            @else
            <div class="form-group">
            @foreach($data->products as $product)
                <div>
                    <input type="checkbox" id="product_{{ $product->id }}" name="selected_products[]" value="{{ $product->id }}">
                    <label for="product_{{ $product->id }}">
                        <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" style="max-width: 100px; max-height: 100px;">
                        {{ $product->name }} - {{ $product->price }} $
                    </label>
                </div>
            @endforeach
            </div>
            @endif
            
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection
