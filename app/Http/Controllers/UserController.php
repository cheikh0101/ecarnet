<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Mail\NewPatientAccount;
use App\Models\Consultation;
use App\Models\Dossier;
use App\Models\Groupe;
use App\Models\GroupeUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.create');
    }

    /**
     * @param \App\Http\Requests\UserStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $user->is_patient = true;
        $user->save();
        Mail::to($user->email)->send(new NewPatientAccount($user));
        $request->session()->flash('user.id', $user->id);
        return redirect()->route('patients');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        $dossier = Dossier::where('user_id', $user->id)->first();
        if (!$dossier) {
            return view('dossier.create', compact('user'));
        }
        $consultations = Consultation::where('user_id', $user->id)->get();

        return view('user.show', compact('user', 'dossier', 'consultations'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        $request->session()->flash('user.id', $user->id);

        return redirect()->route('user.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        try {
            $user->delete();
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            return redirect()->route('patients');
        }
    }
}
