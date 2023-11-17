<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Http\Controllers\UserController;

class OrderController extends Controller {

	public function dashboard() {
		$user = auth()->user(); // Récupérez l'utilisateur connecté
		$orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

		return view('orders.dashboard', compact('orders'));
	}

	public function showAddOrderForm() {
		return view('orders.add');
	}

	public function addOrder(Request $request) {
        // Création d'une nouvelle commande dans la base de données
        $order = new Order();
        $order->user_id = auth()->user()->id; // Vous pouvez ajuster cela selon vos besoins
        $order->status = 'created';
        // Assignez d'autres champs de la commande ici

        $order->save();

		$orderList = Order::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
		$products = Product::all();
		$data = new \stdClass();
		$data->order = $orderList[0];
		$data->products = $products;


        return view('orders.add', compact('data'));
        // return redirect()->route('neworder', compact('data'))->with('success', 'La commande a été créée avec succès !');
	}

	public function addOrderProduct(Request $request) {

	}
    
}
