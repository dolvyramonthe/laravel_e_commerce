@extends("layouts.app")
@section("content")
<div class="container">

	@if (session()->has('message'))
	<div class="alert alert-info">{{ session('message') }}</div>
	@endif

	@if (session()->has("cart"))
	<h1>My Cart</h1>
	<div class="table-responsive shadow mb-3">
		<table class="table table-bordered table-hover bg-white mb-0">
			<thead class="thead-dark" >
				<tr>
					<th>#</th>
					<th>Product</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
					<th>Operations</th>
				</tr>
			</thead>
			<tbody>
				<!-- Set grand total to 0 -->
				@php $total = 0 @endphp

				<!-- Browse cart products in session : session('cart') -->
				@foreach (session("cart") as $key => $item)

					<!-- The grand total is incremented by the total of each product in the cart -->
					@php $total += $item['price'] * $item['quantity'] @endphp
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>
							<strong><a href="{{ route('orders.show', $key) }}" title="Display product" >{{ $item['name'] }}</a></strong>
						</td>
						<td>{{ $item['price'] }} $</td>
						<td>
							<!-- Quantity update form -->
							<form method="POST" action="{{ route('orders.update', $key) }}" class="form-inline d-inline-block" >
							{{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
								<input type="number" name="quantity" placeholder="Quantity ?" value="{{ $item['quantity'] }}" class="form-control mr-2" style="width: 80px" >
								<input type="submit" class="btn btn-primary" value="Update" />
							</form>

						</td>
						<td>
							<!-- Total product = price * quantity -->
							{{ $item['price'] * $item['quantity'] }} $
						</td>
						<td>
							<!-- Link to remove a product from the cart -->
							<a href="{{ route('orders.remove', $key) }}" class="btn btn-outline-danger" title="remove product from cart" >Remove</a>
						</td>
					</tr>
				@endforeach
				<tr colspan="2" >
					<td colspan="4" >Total to pay</td>
					<td colspan="2">
						<!-- Display grand total -->
						<strong>{{ $total }} $</strong>
					</td>
				</tr>
			</tbody>

		</table>
	</div>

	<!-- Link to empty cart -->
	<a class="btn btn-danger" href="{{ route('orders.empty') }}" title="Remove all products from cart" >Empty cart</a>

	@else
	<div class="alert alert-info">No products in cart</div>
	@endif

</div>
@endsection