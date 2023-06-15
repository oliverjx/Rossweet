<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $favorites = $user->favorites;
        
        return view('favorites.index', ['favorites' => $favorites]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'product_id' => 'required',
        ]);

        $favorite = new Favorite;
        $favorite->client_id = $request->input('client_id');
        $favorite->product_id = $request->input('product_id');
        $favorite->save();

        return redirect()->route('favorites.index')->with('success', 'A new favorite has been added');
    }


    public function destroy(string $id)
    {
        $favorite = Favorite::find($id);
        $favorite->delete();

        return redirect()->route('favorites.index')->with('success', 'A favorite has been removed');
    }
}
