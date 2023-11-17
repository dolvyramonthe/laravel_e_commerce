<!-- dashboard.blade.php -->
@extends('layouts.header')

@section('content')
    <div class="container">
        <h1>Order History</h1>
        @if ($orders->isEmpty())
            <p>No order found.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Total order amount</th>
                        <th>Payment method</th>
                        <th>Delivery method</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <form method="POST" action="{{ route('addorder') }}">
            @csrf
            @method('PUT')

            <button type="submit">New Order</button>
        </form>
    </div>
@endsection
