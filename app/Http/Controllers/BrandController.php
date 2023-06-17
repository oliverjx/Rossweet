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


    public function create()
    {
        return view('brands.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required|min:2',
            'img' => 'required',
        ]);

        $brand = new Brand;
        $brand->model = $request->input('model');
        $brand->img = $request->input('img');
        $brand->save();

        return redirect()->route('brands.index')->with('success', 'A new brand has been created');
    }


    public function show(string $id)
    {
        $brand = Brand::find($id);

        return view('brands.show', ['brand' => $brand]);
    }


    public function edit(string $id)
    {
        $brand = Brand::find($id);
        return view('brands.edit', ['brand' => $brand]);
    }


    public function update(Request $request, string $id)
    {
        $brand = Brand::find($id);
        $brand->model = $request->input('model');
        $brand->img = $request->input('img');
        $brand->save();

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully');
    }


    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'A brand has been removed');
    }
}
