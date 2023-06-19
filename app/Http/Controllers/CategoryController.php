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



    public function update(Request $request, Category $category)
    {
        $request->validate([
            'edit-name' => 'required|min:2',
        ]);

        $category->name = $request->input('edit-name');
        $category->description = $request->input('edit-description');
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }
    


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }


}
