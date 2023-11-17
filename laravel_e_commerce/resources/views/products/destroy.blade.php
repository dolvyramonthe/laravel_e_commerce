@extends('layouts.header')

@section('content')
    <h1>Confirm deletion</h1>

    <p>Are you sure you want to delete the product "{{ $product->name }}"?</p>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">yes</button>
    </form>

    <a href="{{ route('products.index') }}">no</a>
@endsection

