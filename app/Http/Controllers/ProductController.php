<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $products = $user->products;

        return view('products.index', ['products' => $products]);
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'price' => 'required|numeric',
        ]);

        $product = new Product;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->time_lapse = $request->input('time_lapse');
        $product->disponibility = true;
        $product->offer = false;
        $product->stock = 0;
        $product->quantity = $request->input('quantity');
        $product->category_id = $request->input('category_id');
        $product->type_id = $request->input('type_id');
        $product->save();

        return redirect()->route('products.index')->with('success', 'A new product has been created');
    }


    public function show(string $id)
    {
        $product = Product::find($id);

        return view('products.show', ['product' => $product]);
    }


    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('products.edit', ['product' => $product]);
    }


    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->time_lapse = $request->input('time_lapse');
        $product->quantity = $request->input('quantity');
        $product->category_id = $request->input('category_id');
        $product->type_id = $request->input('type_id');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }


    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'A product has been removed');
    }

    public function disable(string $id)
    {
        $product = Product::find($id);
        $product->disponibility = false;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product disabled successfully');
    }

    public function enable(string $id)
    {
        $product = Product::find($id);
        $product->disponibility = true;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product enabled successfully');
    }
}
