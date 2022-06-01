<?php

namespace App\Http\Controllers;

use App\Http\Requests\RendezvousStoreRequest;
use App\Http\Requests\RendezvouStoreRequest;
use App\Http\Requests\RendezvousUpdateRequest;
use App\Models\Rendezvous;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RendezvousController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rendezvous = Rendezvous::latest()->get();

        return view('rendezvou.index', compact('rendezvous'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $patients = User::where('is_patient', true)->get();
        $docteurs = User::where('is_docteur', true)->get();
        return view('rendezvou.create', compact('patients', 'docteurs'));
    }

    /**
     * @param \App\Http\Requests\RendezvousStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => ['required'],
            'time' => ['required'],
            'docteur' => 'required',
            'user_id' => 'required'
        ]);
        $rv = new Rendezvous();
        $rv->date = $request->date;
        $rv->time = $request->time;
        $rv->description = $request->description;
        $rv->docteur = $request->docteur;
        $rv->user_id = $request->user_id;
        $rv->created_by = auth()->user()->email;
        $rv->save();

        return redirect()->route('dashboard.rendezvous.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rendezvous $rendezvou
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Rendezvous $rendezvou)
    {
        return view('rendezvou.show', compact('rendezvou'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rendezvous $rendezvou
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Rendezvous $rendezvou)
    {
        return view('rendezvou.edit', compact('rendezvou'));
    }

    /**
     * @param \App\Http\Requests\RendezvousUpdateRequest $request
     * @param \App\Models\Rendezvous $rendezvou
     * @return \Illuminate\Http\Response
     */
    public function update(RendezvousUpdateRequest $request, Rendezvou $rendezvou)
    {
        $rendezvou->update($request->validated());

        $request->session()->flash('rendezvou.id', $rendezvou->id);

        return redirect()->route('rendezvou.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rendezvous $rendezvou
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Rendezvous $rendezvou)
    {
        $rendezvou->delete();

        return redirect()->route('dashboard.rendezvous.index');
    }
}
