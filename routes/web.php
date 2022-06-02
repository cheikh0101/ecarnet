<?php

use App\Http\Controllers\UserController;
use App\Http\Requests\UserStoreRequest;
use App\Mail\NewDocteurAccount;
use App\Models\Consultation;
use App\Models\Groupe;
use App\Models\GroupeUser;
use App\Models\Rendezvous;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

    //return count($rendezVous);

    $patients = User::where('is_patient', true)->get();

    $patientHomme = User::where('is_patient', true)->where('genre', 'M')->get();

    $patientFemme = User::where('is_patient', true)->where('genre', 'F')->get();

    return view('dashboard', compact('rendezVous', 'patients', 'patientHomme', 'patientFemme'));
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

Route::get('dashboard/patient', function () {
    $patients = User::where('is_patient', true)->latest()->get();
    return view('user.patient', compact('patients'));
})->name('patients');

Route::get('dashboard/docteur', function () {
    $docteurs = User::where('is_docteur', true)->latest()->get();
    return view('user.docteurIndex', compact('docteurs'));
})->name('docteurs');

Route::get('dashboard/docteur/create', function () {
    return view('user.docteurCreate');
})->name('docteurCreate');

Route::post('dashboard/docteur/store', function (Request $request) {
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'telephone' => 'required',
        'genre' => 'required'
    ]);
    $newPassword = 'aaaaaaaa';
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->genre = $request->genre;
    $user->telephone = $request->telephone;
    $user->matricule = uniqid();
    $user->password = Hash::make($newPassword);
    $user->is_docteur = true;
    $user->save();
    Mail::to($user->email)->send(new NewDocteurAccount($user));
    return redirect()->route('docteurs');
})->name('docteurStore');

Route::delete('dashboard/docteur/destroy/{user}', function (Request $request, User $user) {
    try {
        $user->delete();
        return redirect()->route('user.index');
    } catch (\Throwable $th) {
        return redirect()->route('docteurs');
    }
})->name('docteurDestroy');

Route::fallback(function () {
    return view('welcome');
});
