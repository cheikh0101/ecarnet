<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\Consultation;
use App\Models\Dossier;
use App\Models\Groupe;
use App\Models\GroupeUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'genre' => $request->genre,
            'matricule' => uniqid(),
            'password' => Hash::make($newPassword),
        ]);

        $groupeUser = new GroupeUser();
        $groupeUser->user_id = $user->id;
        $groupe = Groupe::where('code', 'pat')->first();
        $groupeUser->groupe_id = $groupe->id;
        $groupeUser->save();

        $request->session()->flash('user.id', $user->id);

        return redirect()->route('dashboard.user.index');
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
            return view('dossier.create');
        }
        $consultations = Consultation::where('dossier_id', $dossier->id)->get();

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
        $user->delete();

        return redirect()->route('user.index');
    }
}
