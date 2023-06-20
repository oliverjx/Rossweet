<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::all();

        return view('brands.index', ['brands' => $brands]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required|min:2|unique:brands',
            'img' => 'required|image',
        ]);

        $brand = new Brand;
        $brand->model = $request->input('model');
        
        // Guardar la imagen en la carpeta "public/img"
        $imagePath = $request->file('img')->store('public/img');
        
        // Obtener solo el nombre de la imagen
        $imageName = basename($imagePath);

        $brand->img = $imageName;
        $brand->save();

        return redirect()->route('brands.index')->with('success', 'Se ha creado una nueva marca.');
    }


    public function show(string $id)
    {
        $brand = Brand::find($id);

        return view('brands.show', ['brand' => $brand]);
    }


    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'edit-model' => 'required|min:2',
        ]);
    
        $brand->model = $request->input('edit-model');
    
        if ($request->hasFile('edit-img') && $request->file('edit-img')->isValid()) {
            $imagePath = $request->file('edit-img')->store('public/img');
            // Obtener solo el nombre de la imagen
            $imageName = basename($imagePath);
            $brand->img = $imageName;
        }
    
        $brand->save();
    
        return redirect()->route('brands.index')->with('success', 'Brand updated successfully');
    }
    

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'A brand has been removed');
    }
}
