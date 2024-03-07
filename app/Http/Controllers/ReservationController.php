<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function createReservation($eventId)
    {
        $evenement = Evenement::findOrFail($eventId);
        if ($evenement->mode === 'automatique' && $evenement->places > 0) {
            Reservation::create([
                'titre' => $evenement->titre,
                'date' => now(),
                'statut' => 'Reserved',
                'numplace' => $this->getNextPlaceNumber($evenement),
                'evenement_id' => $evenement->id,
                'user_id' => auth()->id(),
            ]);
            $evenement->decrement('places');
        } else {
            if ($evenement->mode === 'manuelle' && $evenement->places > 0) {
                Reservation::create([
                    'titre' => $evenement->titre,
                    'date' => now(),
                    'statut' => 'Pending',
                    'numplace' => null,
                    'evenement_id' => $evenement->id,
                    'user_id' => auth()->id(),
                ]);
            }
        }
        return redirect()->route('EvenementsC');
    }

    private function getNextPlaceNumber($evenement)
    {
        $highestReservedPlace = Reservation::where('evenement_id', $evenement->id)
            ->where('statut', 'Accepted')
            ->max('numplace');
        return $highestReservedPlace + 1;
    }

    public function viewReservations($eventId)
    {
        $eventReservations = Reservation::where('evenement_id', $eventId)->get();
        return view('organisateur.reservations', ['reservations' => $eventReservations]);
    }

    public function updateReservationStatus(Request $request, $reservationId){
        $request->validate([
            'statut' => 'required|in:Reserved,Rejected',
        ]);
        $reservation = Reservation::findOrFail($reservationId);
        // dd($reservation);
        $reservation->statut = $request->statut;
        $reservation->numplace = $this->getNextPlaceNumber($reservation->evenement);
        $reservation->evenement->decrement('places');

        $reservation->save();
        return back();
    }


    public function generateTicket(Reservation $reservation, Evenement $event)
    {
        return view('client.ticket', compact('reservation', 'event'));
    }
}
