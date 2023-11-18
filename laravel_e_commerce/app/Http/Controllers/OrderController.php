<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Ingredient;
use App\Http\Controllers\UserController;

class OrderController extends Controller {

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
            'products' => 'required|array', // Ensure products are provided
            'quantities.*' => 'required|integer|min:1', // Validate quantities for each product
        ]);

        $userId = Auth::id(); // Get the logged-in user's ID
        $status = 'pending';

        // Retrieve selected products and quantities from the form
        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);

        // Calculate total amount for the order
        $totalAmount = 0;

        foreach ($products as $key => $productId) {
            $quantity = $quantities[$key];

            $product = Product::findOrFail($productId);
            $totalAmount += $product->price * $quantity;
        }

        // Create the order with user ID and calculated total amount
        $order = Order::create([
            'user_id' => $userId,
            'status' => $status,
            'total_amount' => $totalAmount,
        ]);

        // Associate products with the order
        foreach ($products as $key => $productId) {
            $quantity = $quantities[$key];

            $product = Product::findOrFail($productId);
            $totalAmount = $product->price * $quantity; // Calculate total amount for the product

            // Attach product to the order with quantity and total amount
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
