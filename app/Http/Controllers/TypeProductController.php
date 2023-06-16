<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\TypeProduct;

class TypeProductController extends Controller
{

    public function index()
    {
        $typeProducts = TypeProduct::all();

        return view('typeProducts.index', ['typeProducts' => $typeProducts]);
    }


    public function create()
    {
        return view('typeProducts.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:type_products|min:2',
        ]);

        $typeProduct = new TypeProduct;
        $typeProduct->name = $request->input('name');
        $typeProduct->description = $request->input('description') ?? 'no description';
        $typeProduct->save();

        return redirect()->route('typeProducts.index')->with('success', 'A new type product has been created');
    }


    public function show(string $id)
    {
        $typeProduct = TypeProduct::find($id);

        return view('typeProducts.show', ['typeProduct' => $typeProduct]);
    }


    public function edit(string $id)
    {
        $typeProduct = TypeProduct::find($id);
        return view('typeProducts.edit', ['typeProduct' => $typeProduct]);
    }


    public function update(Request $request, string $id)
    {
        $typeProduct = TypeProduct::find($id);
        $typeProduct->name = $request->input('name');
        $typeProduct->description = $request->input('description') ?? 'no description';
        $typeProduct->save();

        return redirect()->route('typeProducts.index')->with('success', 'Type product updated successfully');
    }


    public function destroy(string $id)
    {
        $typeProduct = TypeProduct::find($id);
        $typeProduct->delete();

        return redirect()->route('typeProducts.index')->with('success', 'A type product has been removed');
    }
}