<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return view('categories.index', ['categories' => $categories]);
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
        ]);

        $category = new Category;
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return redirect()->route('categories.index')->with('success', 'A new category has been created');
    }


    public function show(string $id)
    {
        
        $category = Category::find($id);

        dd($category);

        return view('categories.show', ['category' => $category]);
    }


    public function edit(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Category not found');
        }

        return view('categories.edit', ['category' => $category]);
    }



    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:2',
        ]);
        $category = Category::find($id);
        $category->name = $request->input('edit-name');
        $category->description = $request->input('edit-description');
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }


    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'A category has been removed');
    }
}
