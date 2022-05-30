<?php

namespace App\Http\Controllers;

use App\Http\Requests\DossierStoreRequest;
use App\Http\Requests\DossierUpdateRequest;
use App\Models\Dossier;
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
    public function store(DossierStoreRequest $request)
    {
        $dossier = Dossier::create($request->validated());

        $request->session()->flash('dossier.id', $dossier->id);

        return redirect()->route('dossier.index');
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
