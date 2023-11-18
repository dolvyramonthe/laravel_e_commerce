<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Http\Controllers\UserController;

class OrderController extends Controller {

    // public function dashboard() {
    //     $user = auth()->user();
    //     $orders = Order::with('products')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

    //     return view('orders.dashboard', compact('orders'));
    // }

    // public function create()
    // {
    //     $products = Product::all();
    //     return view('orders.create', compact('products'));
    // }

    // public function store(Request $request)
    // {
    //     $user = auth()->user();

    //     $validatedData = $request->validate([
    //         'products.*' => 'required|exists:products,id',
    //         'quantities.*' => 'required|numeric|min:1',
    //     ]);

    //     $order = new Order([
    //         'user_id' => $user->id,
    //         'status' => 'pending',
    //     ]);
    //     $order->save();

    //     foreach ($validatedData['products'] as $key => $productId) {
    //         $product = Product::findOrFail($productId);
    //         $quantity = $validatedData['quantities'][$key];

    //         $orderProduct = new OrderProduct([
    //             'order_id' => $order->id,
    //             'product_id' => $productId,
    //             'quantity' => $quantity,
    //             'total_amount' => $product->price * $quantity,
    //         ]);
    //         $orderProduct->save();
    //     }

    //     return redirect()->route('dashboard')->with('success', 'Order created successfully!');
    // }

    // public function edit($orderId)
    // {
    //     $order = Order::findOrFail($orderId);
    //     $allProducts = Product::all(); // Fetch all products (adjust this query as needed)

    //     return view('orders.edit', compact('order', 'allProducts'));
    // }

    // public function addProducts(Request $request, $orderId)
    // {
    //     $validatedData = $request->validate([
    //         'products' => 'required|array',
    //         'products.*.id' => 'required|exists:products,id',
    //         'products.*.quantity' => 'required|integer|min:1',
    //     ]);

    //     $order = Order::findOrFail($orderId);

    //     foreach ($validatedData['products'] as $item) {
    //         $product = Product::findOrFail($item['id']);

    //         // Check if the product already exists in the order
    //         $existingProduct = $order->products()->where('product_id', $product->id)->first();

    //         if ($existingProduct) {
    //             // If the product already exists in the order, update the quantity
    //             $existingProduct->pivot->quantity += $item['quantity'];
    //             $existingProduct->pivot->save();
    //         } else {
    //             // If the product is not in the order, attach it with the given quantity
    //             $order->products()->attach($product->id, ['quantity' => $item['quantity']]);
    //         }
    //     }

    //     return redirect()->back()->with('success', 'Products added successfully to the order!');
    // }

    // public function updateProduct(Request $request, $orderId)
    // {
    //     $validatedData = $request->validate([
    //         'product_id' => 'required|exists:order_products,product_id,order_id,' . $orderId,
    //         'sugar_quantity' => 'required|integer|min:0',
    //         'popings' => 'required|string',
    //     ]);

    //     $order = Order::findOrFail($orderId);

    //     $product = $order->products()->where('product_id', $validatedData['product_id'])->firstOrFail();

    //     $product->pivot->sugar_quantity = $validatedData['sugar_quantity'];
    //     $product->pivot->popings = $validatedData['popings'];

    //     $product->pivot->save();

    //     return redirect()->back()->with('success', 'Product details updated successfully!');
    // }

    // public function cancel($id)
    // {
    //     // Logic to cancel the order
    // }



    public function index()
    {
        $orders = Order::with('products.ingredients')->get();

        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('products.ingredients')->find($id);

        if (!$order) {
            return redirect()->route('orders.index')->with('error', 'Order not found');
        }

        return view('orders.show', compact('order'));
    }

    public function create()
    {
        $products = Product::all();
        $ingredients = Ingredient::all();

        return view('orders.create', compact('products', 'ingredients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required', // Add any other necessary validation rules
            'status' => 'required',
            'total_amount' => 'required',
            // Add validation rules for other fields as needed
        ]);

        $orderData = $request->only(['user_id', 'status', 'total_amount']); // Get validated order data

        $order = new Order($orderData); // Create a new Order instance with validated data
        $order->save();

        // Handling products
        $products = $request->input('products', []);

        foreach ($products as $productId) {
            $product = Product::find($productId);

            // Create order-product relationship
            $quantity = $request->input('quantity_'.$productId);
            $totalAmount = $request->input('total_amount_'.$productId);

            $order->products()->attach($productId, [
                'quantity' => $quantity,
                'total_amount' => $totalAmount,
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }

    public function destroy($id)
    {
        // Logic to delete an order
        // $order = Order::findOrFail($id);
        // $order->delete();
        // return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }

}
