<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{

    public function view(){
        $evenements = Evenement::all();
        return view('organisateur.evenement', compact('evenements'));
    }
}
