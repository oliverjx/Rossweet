<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\TypeProduct;

class ProductController extends Controller
{

    public function index()
    {

        $products = Product::all();
        $categories = Category::all();
        $types = TypeProduct::all();
        return view('products.index', ['products' => $products, 'categories' => $categories, 'types' => $types]);
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
         // Guardar la imagen en la carpeta "public/img"
         $imagePath = $request->file('img')->store('public/img');
        
         // Obtener solo el nombre de la imagen
         $imageName = basename($imagePath);
 
         $product->img = $imageName;
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
        $categories = Category::all();
        $types = TypeProduct::all();
        return view('products.edit', ['product' => $product, 'categories' => $categories, 'types' => $types]);
    }


    public function update(Request $request, string $id)
    {

        $product = Product::find($id);
        
        
        if ($request->hasFile('edit-img') && $request->file('edit-img')->isValid()) {
            $imagePath = $request->file('edit-img')->store('public/img');
            // Obtener solo el nombre de la imagen
            $imageName = basename($imagePath);
            $product->img = $imageName;
        }
       
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

 
}
