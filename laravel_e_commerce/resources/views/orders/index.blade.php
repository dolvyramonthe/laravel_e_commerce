@extends('layouts.header')

@section('content')

    <style>

    .container table {
        border-collapse: collapse;
        width: 100%;
    }

    .container th, td {
        padding: 8px;
        text-align: left;
        vertical-align: middle;
    }

    .container th {
        background-color: #f2f2f2;
    }

    .container tr:nth-child(even) {
        background-color: gray;
    }

</style>


    <div class="container">
        <h1 style="font-size: 24px; color: #fff; margin-bottom: 20px;">All Orders</h1>
        <a href="{{ route('orders.create') }}" style="text-decoration: none; display: block; color: violet; margin-top: 20px; margin-bottom: 20px; font-size: 20px;">New Order</a>
        @if(count($orders) > 0)
            <table class="table">
                <thead>
                    <tr style="background-color: #f2f2f2;">
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
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary" style="text-decoration: none; color: violet; margin-right: 10px;">View</a>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-success" style="text-decoration: none; color: blue; margin-right: 10px;">Update</a>
                                <form action="{{ route('orders.show', $order->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this order?')" style="text-decoration: none; color: red; margin-right: 10px;">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="font-size: 24px; color: #fff; margin-bottom: 20px;">No orders found.</p>
        @endif
    </div>
@endsection
