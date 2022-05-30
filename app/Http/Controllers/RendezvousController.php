<?php

namespace App\Http\Controllers;

use App\Http\Requests\RendezvousStoreRequest;
use App\Http\Requests\RendezvouStoreRequest;
use App\Http\Requests\RendezvousUpdateRequest;
use App\Models\Rendezvous;
use App\Models\User;
use Illuminate\Http\Request;

class RendezvousController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rendezvous = Rendezvous::all();

        return view('rendezvou.index', compact('rendezvous'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = User::all();
        return view('rendezvou.create', compact('users'));
    }

    /**
     * @param \App\Http\Requests\RendezvousStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RendezvouStoreRequest $request)
    {
        return 'hello';
        $rendezvou = Rendezvous::create($request->validated());

        $request->session()->flash('rendezvou.id', $rendezvou->id);

        return redirect()->route('rendezvou.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rendezvous $rendezvou
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Rendezvou $rendezvou)
    {
        return view('rendezvou.show', compact('rendezvou'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rendezvous $rendezvou
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Rendezvou $rendezvou)
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
    public function destroy(Request $request, Rendezvou $rendezvou)
    {
        $rendezvou->delete();

        return redirect()->route('rendezvou.index');
    }
}
