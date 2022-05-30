<?php

namespace App\Http\Controllers;

use App\Http\Requests\PathologieStoreRequest;
use App\Http\Requests\PathologieUpdateRequest;
use App\Models\Pathologie;
use Illuminate\Http\Request;

class PathologieController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pathologies = Pathologie::all();

        return view('pathologie.index', compact('pathologies'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pathologie.create');
    }

    /**
     * @param \App\Http\Requests\PathologieStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PathologieStoreRequest $request)
    {
        $pathologie = Pathologie::create($request->validated());

        $request->session()->flash('pathologie.id', $pathologie->id);

        return redirect()->route('pathologie.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pathologie $pathologie
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Pathologie $pathologie)
    {
        return view('pathologie.show', compact('pathologie'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pathologie $pathologie
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Pathologie $pathologie)
    {
        return view('pathologie.edit', compact('pathologie'));
    }

    /**
     * @param \App\Http\Requests\PathologieUpdateRequest $request
     * @param \App\Models\Pathologie $pathologie
     * @return \Illuminate\Http\Response
     */
    public function update(PathologieUpdateRequest $request, Pathologie $pathologie)
    {
        $pathologie->update($request->validated());

        $request->session()->flash('pathologie.id', $pathologie->id);

        return redirect()->route('pathologie.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pathologie $pathologie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Pathologie $pathologie)
    {
        $pathologie->delete();

        return redirect()->route('pathologie.index');
    }
}
