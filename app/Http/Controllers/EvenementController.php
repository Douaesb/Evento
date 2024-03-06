<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{

    public function view()
    {
        $categories = Categorie::all();
        $evenements = Evenement::all();
        // dd($evenements);
        return view('organisateur.evenement', compact('evenements'), compact('categories'));
    }

    public function create(Request $request){
        try{
            $request->validate([
                'titre' => ['required','string','max:255'],
                'description' => ['required','string'],
                'lieu' => ['required','string','max:255'],
                'places' => 'required',
                'mode' => ['required','string','in:automatique,manuelle'],
            ]);
            $user = auth()->user();
            Evenement::create([
                'titre' => $request->titre,
                'description' => $request->description ,
                'date' => now()->toDateString(),
                'lieu' =>  $request->lieu,
                'places' => $request->places ,
                'mode' => $request->mode,
                'user_id' => $user->id,
                'categorie_id' =>$request->categorieID,
            ]);
            return redirect()->route('Evenements');
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }
}
