<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvenementController extends Controller
{

    public function viewAll()
    {
        $user = Auth::id();
        $categories = Categorie::all();
        $evenements = Evenement::orderby('created_at', 'desc')
            ->get();
        // dd($evenements);
        return view('admin.allEvents', compact('evenements'), compact('categories'));
    }

    public function viewClient(Request $request)
    {
        $categories = Categorie::all();
        $reservation = Reservation::all();
        $query = Evenement::query();
        $query->where('statut', 'Accepted');
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('titre', 'like', '%' . $searchTerm . '%');
        }
        $evenements = $query->orderBy('created_at', 'desc')->get();
        return view('client.evenement', compact('evenements', 'reservation', 'categories'));
    }



    public function view()
    {
        $user = Auth::id();
        $categories = Categorie::all();
        $evenements = Evenement::where('user_id', $user)
            ->orderby('created_at', 'desc')
            ->get();
        // dd($evenements);
        return view('organisateur.evenement', compact('evenements'), compact('categories'));
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'titre' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'lieu' => ['required', 'string', 'max:255'],
                'places' => 'required',
                'mode' => ['required', 'string', 'in:automatique,manuelle'],
            ]);
            $user = auth()->user();
            Evenement::create([
                'titre' => $request->titre,
                'description' => $request->description,
                'date' => now()->toDateString(),
                'lieu' =>  $request->lieu,
                'places' => $request->places,
                'mode' => $request->mode,
                'user_id' => $user->id,
                'categorie_id' => $request->categorieID,
            ]);
            return redirect()->route('Evenements');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function updateStatus(Request $request, $eventId)
    {
        $request->validate([
            'statut' => 'required|in:Accepted,Rejected',
        ]);
        $event = Evenement::findOrFail($eventId);
        $event->statut = $request->statut;
        $event->save();
        return back();
    }

    public function delete(Evenement $evenement)
    {
        $evenement->delete();
        return redirect()->route('Evenements');
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'titre' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'lieu' => ['required', 'string'],
                'places' => ['required', 'integer'],
                'mode' => ['required', 'in:automatique,manuelle'],
            ]);

            $event = Evenement::findOrFail($request->event_id);

            $event->update([
                'titre' => $request->titre,
                'description' => $request->description,
                'lieu' => $request->lieu,
                'places' => $request->places,
                'mode' => $request->mode,
                'categorie_id' => $request->categorie,
                'statut' => "Pending",
            ]);

            return redirect()->route('Evenements')->with('success', 'Event updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('Evenements')->with('error', 'Error updating event');
        }
    }

    public function showDetails($id)
    {
        $event = Evenement::findOrFail($id);

        return view('client.eventDetails', compact('event'));
    }
}
