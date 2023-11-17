@extends('layouts.header')

@section('content')
    <div class="container">
        <div>
            @if (count($orders) > 0)
                <table border="1">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Status</th>
                            <th>Ordered Products</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    <ul>
                                        @foreach($order->products as $product)
                                            <li>
                                                {{ $product->name }} (Quantity: {{ $product->pivot->quantity }},
                                                Total Amount: ${{ $product->pivot->total_amount }})
                                                @if($product->image_path)
                                                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="max-width: 50px; max-height: 50px;">
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ route('orders.edit', $order->id) }}">Update</a>
                                    <form method="POST" action="{{ route('orders.cancel', $order->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Cancel</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No Orders to display</p>
            @endif
        </div>
        <a href="{{ route('orders.create') }}">New Order</a>
    </div>
@endsection

