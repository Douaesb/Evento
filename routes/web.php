<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/homeO', [UserController::class, 'Statistics'])->name('organisateur.home');

// Route::get('/homeC', function () {
//     return view('client.home');
// })->middleware(['auth', 'verified'])->name('client.home');


Route::middleware('auth', 'admin')->group(function () {
    Route::get('/homeA', [UserController::class, 'stats'])->name('admin.dashboard');
    Route::get('/Categories', [CategorieController::class, 'view'])->name('categories');
    Route::post('/Categories', [CategorieController::class, 'create'])->name('addCategorie');
    Route::put('/Categorie', [CategorieController::class, 'update'])->name('updateCategorie');
    Route::delete('/Categories/{categorie}', [CategorieController::class, 'delete'])->name('deleteCategorie');
    Route::get('/allEvenements', [EvenementController::class, 'viewAll'])->name('allEvenements');
    Route::patch('/update-status/{event}', [EvenementController::class, 'updateStatus'])->name('updateStatus');
    Route::get('/Users', [UserController::class, 'viewUsers'])->name('users');
    Route::put('/ban/user/{userId}',  [UserController::class, 'banUser'])->name('ban.user');
    Route::put('/Unban/user/{userId}',  [UserController::class, 'unbanUser'])->name('unban.user');
});

Route::middleware('auth', 'organisateur','banned')->group(function () {
    Route::get('/Evenements', [EvenementController::class, 'view'])->name('Evenements');
    Route::post('/Evenements', [EvenementController::class, 'create'])->name('addEvent');
    Route::put('/update-event', [EvenementController::class, 'update'])->name('updateEvent');
    Route::delete('/Evenements/{evenement}', [EvenementController::class, 'delete'])->name('deleteEvenement');
    Route::get('/view-reservations/{eventId}', [ReservationController::class, 'viewReservations'])->name('viewReservations');
    Route::patch('/update-reservation-statut/{reservationId}', [ReservationController::class, 'updateReservationStatus'])->name('updateReservationStatus');
});

Route::middleware('auth', 'client','banned')->group(function () {
    Route::get('/Events', [EvenementController::class, 'viewClient'])->name('EvenementsC');
    Route::get('/eventDetails/{id}', [EvenementController::class, 'showDetails'])->name('eventDetails');
    Route::post('/events/search', [EvenementController::class, 'viewClient'])->name('events.search');
    Route::post('/create-reservation/{eventId}', [ReservationController::class, 'createReservation'])->name('createReservation');
    Route::get('/generate-ticket/{reservation}/{event}', [ReservationController::class, 'generateTicket'])->name('generateTicket');
});









require __DIR__ . '/auth.php';
