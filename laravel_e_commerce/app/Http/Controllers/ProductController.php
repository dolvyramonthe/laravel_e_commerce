<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


    class ProductController extends Controller
    {
        public function index()
        {
            $products = Product::all();
            return view('products.index', compact('products'));
        }

        public function show($id)
        {
            $product = Product::find($id);
            return view('products.show', compact('product'));
        }

        public function create()
        {

            return view('products.create');
        }

        public function destroy($id)
        {
            $product = Product::findOrFail($id);

            if ($product->image_path && Storage::exists('public/' . $product->image_path)) {
                Storage::delete('public/' . $product->image_path);
            }

            $product->delete();

            return redirect()->route('products.index')->with('success', 'Product deleted successfully');
        }

        public function store(Request $request)
        {
            $request->validate([
                'image' => 'mimes:jpeg,png,jpg,gif,svg',
            ]);

            $product = new Product([
                'name' => $request->input('name'),
                'desc' => $request->input('desc'),
                'price' => $request->input('price'),
                'image_path' => '',
                'is_available' => $request->has('is_available'),
                'poppings' => $request->input('poppings'),
                'sugar_quantity' => $request->input('sugar_quantity'),
                'size' => $request->input('size'),
            ]);

            $lastProduct = Product::orderBy('id', 'desc')->first();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = 'product_image_' . $lastProduct->id + 1 . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/', $filename);
                $product->image_path = $filename;
            }

            $product->save();

            return redirect()->route('products.index')->with('success', 'Product successfully created');
        }

        public function edit($id)
        {
            $product = Product::find($id);
            return view('products.edit', compact('product'));
        }

        public function update(Request $request, $id)
        {
            $product = Product::find($id);

            $product->update([
                'name' => $request->input('name'),
                'desc' => $request->input('desc'),
                'price' => $request->input('price'),
                'is_available' => $request->has('is_available'),
                'poppings' => $request->input('poppings'),
                'sugar_quantity' => $request->input('sugar_quantity'),
                'size' => $request->input('size'),
            ]);

            return redirect()->route('products.index')->with('success', 'Product updated successfully');

        }
    }
