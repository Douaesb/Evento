<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Evenement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function viewUsers()
    {
        $users = User::where('role', '<>', 'admin')->get();
        return view('admin.users', compact('users'));
    }

    public function banUser($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->update(['banned' => true]);
            if (auth()->check() && auth()->user()->id == $userId) {
                auth()->logout();
                return redirect()->route('login')->with('banned_message', 'You are banned from logging in.');
            }

            return redirect()->route('users')->with('success', 'User has been banned.');
        }

        return redirect()->route('users')->with('error', 'User not found.');
    }

    public function unbanUser($userId)
{
    $user = User::find($userId);
    if ($user) {
        $user->update(['banned' => false]);
        return redirect()->route('users')->with('success', 'User unbanned successfully.');
    }
    return redirect()->route('users')->with('error', 'User not found.');
}

public function stats()
{
    $clientCount = User::where('role', 'client')->count();
    $organisateurCount = User::where('role', 'organisateur')->count();
    $totalEvents = Evenement::count();
    $mostReservedEvent = Evenement::select('titre')
    ->withCount('reservations')
    ->orderBy('reservations_count', 'desc')
    ->value('titre');
    $mostActiveOrganisateur = User::select('name')
    ->where('role', 'organisateur')
    ->withCount('evenements')
    ->orderBy('evenements_count', 'desc')
    ->value('name');

    $mostActiveClient = User::select('name')
    ->where('role', 'client')
    ->withCount('reservations')
    ->orderBy('reservations_count', 'desc')
    ->value('name');
    $eventWithMostReservations = Evenement::select('titre')
    ->withCount('reservations')
    ->orderBy('reservations_count', 'desc')
    ->value('titre');
    $mostUsedCategory = Categorie::select('nom')
    ->withCount('events')
    ->orderBy('events_count', 'desc')
    ->value('nom');
    return view('admin.dashboard', compact('clientCount','organisateurCount','totalEvents','mostReservedEvent','mostActiveOrganisateur','mostActiveClient'));
}


}
