<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{

    public function view(){
        $categories = Categorie::all();
        return view('admin.categories', compact('categories'));
    }

    public function create(Request $request){
        try{
            $request->validate([
                'nom' => ['required','string','max:255'],
            ]);

            $user = Auth::user();

            Categorie::create([
                'nom' => $request->nom,
                'user_id' => $user->id,
            ]);
            return redirect()->route('categories');
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'nom' => ['required', 'string', 'max:255'],
            ]);
                $oneCategorie = Categorie::findOrFail($request->categorieID);
    
            $oneCategorie->update([
                'nom' => $request->nom,
            ]);
    
            return redirect()->route('categories');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    
    public function delete(Categorie $categorie){
        $categorie->delete();
        return redirect()->route('categories');
    }
}
