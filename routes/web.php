<?php

use App\Http\Controllers\UserController;
use App\Http\Requests\UserStoreRequest;
use App\Models\Consultation;
use App\Models\Rendezvous;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {

    $rendezVous = Rendezvous::all();

    $consultationsJournalieres = Consultation::where('created_at', date('d'))->get();

    return view('dashboard', compact('rendezVous', 'consultationsJournalieres'));
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard', 'as' =>
'dashboard.'], function () {
    Route::resource('user', UserController::class);

    Route::resource('groupe', App\Http\Controllers\GroupeController::class);

    Route::resource('dossier', App\Http\Controllers\DossierController::class);

    Route::resource('rendezvous', App\Http\Controllers\RendezvousController::class);

    Route::resource('consultation', App\Http\Controllers\ConsultationController::class);

    Route::resource('pathologie', App\Http\Controllers\PathologieController::class);

    Route::resource('medicament', App\Http\Controllers\MedicamentController::class);
});

Route::get('user', [UserController::class, 'index'])->name('user');

Route::fallback(function () {
    return view('welcome');
});
