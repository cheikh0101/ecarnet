<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PathologieStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dossier_id' => ['required', 'integer', 'exists:dossiers,id'],
            'symptomes' => ['required', 'string'],
            'medicament_prescrits' => ['string'],
            'historique_maladie' => ['string'],
            'tension_arterielle' => ['string'],
            'temperature' => ['string'],
            'pouls' => ['string'],
            'frequence_respiratoire' => ['string'],
        ];
    }
}
