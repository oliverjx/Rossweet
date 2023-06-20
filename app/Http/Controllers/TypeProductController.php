<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\TypeProduct;

class TypeProductController extends Controller
{

    public function index()
    {
        $typesProducts = TypeProduct::all();

        return view('typeProducts.index', ['typesProducts' => $typesProducts]);
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

        return redirect()->route('typesProducts.index')->with('success', 'A new type product has been created');
    }



    public function update(Request $request, TypeProduct $typeProduct)
    {
        $request->validate([
            'edit-name' => 'required|min:2',
        ]);
    
        $typeProduct->name = $request->input('edit-name');
        $typeProduct->description = $request->input('edit-description') ?? 'no description';
        $typeProduct->save();
    
        return redirect()->route('typesProducts.index')->with('success', 'Type product updated successfully');
    }
    

    public function destroy(TypeProduct $typeProduct)
    {
        
        $typeProduct->delete();

        return redirect()->route('typesProducts.index')->with('success', 'A type product has been removed');
    }
}