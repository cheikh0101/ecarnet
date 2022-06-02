<?php

namespace App\Http\Controllers;

use App\Http\Requests\DossierStoreRequest;
use App\Http\Requests\DossierUpdateRequest;
use App\Models\Dossier;
use App\Models\User;
use Illuminate\Http\Request;

class DossierController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dossiers = Dossier::all();

        return view('dossier.index', compact('dossiers'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('dossier.create');
    }

    /**
     * @param \App\Http\Requests\DossierStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dossier = new Dossier();
        $dossier->numero = uniqid();
        $dossier->datenaissance = $request->datenaissance;
        $dossier->cni = $request->cni;
        $dossier->antecedent_medicaux = $request->antecedent_medicaux;
        $dossier->antecedent_chirugicaux = $request->antecedent_chirugicaux;
        $dossier->antecedent_familiaux = $request->antecedent_familiaux;
        $dossier->user_id = $request->user_id;
        $dossier->save();

        $request->session()->flash('dossier.id', $dossier->id);

        return redirect()->route('patients');
        //$user = User::where('id', $request->user_id)->first();
        //return view('user.show', compact('user', 'dossier'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dossier $dossier
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Dossier $dossier)
    {
        return view('dossier.show', compact('dossier'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dossier $dossier
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Dossier $dossier)
    {
        return view('dossier.edit', compact('dossier'));
    }

    /**
     * @param \App\Http\Requests\DossierUpdateRequest $request
     * @param \App\Models\Dossier $dossier
     * @return \Illuminate\Http\Response
     */
    public function update(DossierUpdateRequest $request, Dossier $dossier)
    {
        $dossier->update($request->validated());

        $request->session()->flash('dossier.id', $dossier->id);

        return redirect()->route('dossier.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dossier $dossier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Dossier $dossier)
    {
        $dossier->delete();

        return redirect()->route('dossier.index');
    }
}
