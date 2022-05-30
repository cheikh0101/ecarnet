<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicamentStoreRequest;
use App\Http\Requests\MedicamentUpdateRequest;
use App\Models\Medicament;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $medicaments = Medicament::all();

        return view('medicament.index', compact('medicaments'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('medicament.create');
    }

    /**
     * @param \App\Http\Requests\MedicamentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicamentStoreRequest $request)
    {
        $medicament = Medicament::create($request->validated());

        $request->session()->flash('medicament.id', $medicament->id);

        return redirect()->route('medicament.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Medicament $medicament
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Medicament $medicament)
    {
        return view('medicament.show', compact('medicament'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Medicament $medicament
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Medicament $medicament)
    {
        return view('medicament.edit', compact('medicament'));
    }

    /**
     * @param \App\Http\Requests\MedicamentUpdateRequest $request
     * @param \App\Models\Medicament $medicament
     * @return \Illuminate\Http\Response
     */
    public function update(MedicamentUpdateRequest $request, Medicament $medicament)
    {
        $medicament->update($request->validated());

        $request->session()->flash('medicament.id', $medicament->id);

        return redirect()->route('medicament.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Medicament $medicament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Medicament $medicament)
    {
        $medicament->delete();

        return redirect()->route('medicament.index');
    }
}
