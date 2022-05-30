<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultationStoreRequest;
use App\Http\Requests\ConsultationUpdateRequest;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $consultations = Consultation::all();

        return view('consultation.index', compact('consultations'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('consultation.create');
    }

    /**
     * @param \App\Http\Requests\ConsultationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultationStoreRequest $request)
    {
        $consultation = Consultation::create($request->validated());

        $request->session()->flash('consultation.id', $consultation->id);

        return redirect()->route('consultation.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Consultation $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Consultation $consultation)
    {
        return view('consultation.show', compact('consultation'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Consultation $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Consultation $consultation)
    {
        return view('consultation.edit', compact('consultation'));
    }

    /**
     * @param \App\Http\Requests\ConsultationUpdateRequest $request
     * @param \App\Models\Consultation $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(ConsultationUpdateRequest $request, Consultation $consultation)
    {
        $consultation->update($request->validated());

        $request->session()->flash('consultation.id', $consultation->id);

        return redirect()->route('consultation.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Consultation $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Consultation $consultation)
    {
        $consultation->delete();

        return redirect()->route('consultation.index');
    }
}
