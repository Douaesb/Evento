<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/homeA', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::get('/homeC', function () {
    return view('client.home');
})->middleware(['auth', 'verified'])->name('client.home');


Route::get('/homeO', function () {
    return view('organisateur.home');
})->middleware(['auth', 'verified'])->name('organisateur.home');


Route::get('/Categories', [CategorieController::class, 'view'])->name('categories');
Route::post('/Categories', [CategorieController::class, 'create'])->name('addCategorie');
Route::put('/Categorie', [CategorieController::class, 'update'])->name('updateCategorie');
Route::delete('/Categories/{categorie}', [CategorieController::class, 'delete'])->name('deleteCategorie');

Route::get('/allEvenements', [EvenementController::class, 'viewAll'])->name('allEvenements');

Route::get('/Events', [EvenementController::class, 'viewClient'])->name('EvenementsC');

Route::get('/Evenements', [EvenementController::class, 'view'])->name('Evenements');
Route::post('/Evenements', [EvenementController::class, 'create'])->name('addEvent');
Route::patch('/update-status/{event}', [EvenementController::class, 'updateStatus'])->name('updateStatus');
Route::delete('/Evenements/{evenement}', [EvenementController::class, 'delete'])->name('deleteEvenement');
Route::put('/update-event', [EvenementController::class, 'update'])->name('updateEvent');
Route::get('/eventDetails/{id}', [EvenementController::class, 'showDetails'])->name('eventDetails');
Route::post('/create-reservation/{eventId}', [ReservationController::class, 'createReservation'])->name('createReservation');
Route::get('/view-reservations/{eventId}', [ReservationController::class, 'viewReservations'])
    ->name('viewReservations');
Route::patch('/update-reservation-statut/{reservationId}', [ReservationController::class, 'updateReservationStatus'])->name('updateReservationStatus');
Route::get('/generate-ticket/{reservation}/{event}', [ReservationController::class, 'generateTicket'])->name('generateTicket');






require __DIR__ . '/auth.php';
