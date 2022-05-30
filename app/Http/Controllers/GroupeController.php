<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupeStoreRequest;
use App\Http\Requests\GroupeUpdateRequest;
use App\Models\Groupe;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $groupes = Groupe::all();

        return view('groupe.index', compact('groupes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('groupe.create');
    }

    /**
     * @param \App\Http\Requests\GroupeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupeStoreRequest $request)
    {
        $groupe = Groupe::create($request->validated());

        $request->session()->flash('groupe.id', $groupe->id);

        return redirect()->route('groupe.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Groupe $groupe
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Groupe $groupe)
    {
        return view('groupe.show', compact('groupe'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Groupe $groupe
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Groupe $groupe)
    {
        return view('groupe.edit', compact('groupe'));
    }

    /**
     * @param \App\Http\Requests\GroupeUpdateRequest $request
     * @param \App\Models\Groupe $groupe
     * @return \Illuminate\Http\Response
     */
    public function update(GroupeUpdateRequest $request, Groupe $groupe)
    {
        $groupe->update($request->validated());

        $request->session()->flash('groupe.id', $groupe->id);

        return redirect()->route('groupe.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Groupe $groupe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Groupe $groupe)
    {
        $groupe->delete();

        return redirect()->route('groupe.index');
    }
}
