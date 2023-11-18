@extends('layouts.header')

@section('content')
    <div class="container">
        <h1>All Orders</h1>
        <a href="{{ route('orders.create') }}">New Order</a>
        @if(count($orders) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Total Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->total_amount }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-success">Update</a>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this order?')">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No orders found.</p>
        @endif
    </div>
@endsection
