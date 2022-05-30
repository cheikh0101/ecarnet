<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DossierStoreRequest extends FormRequest
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
            'numero' => ['required', 'string'],
            'datenaissance' => ['string'],
            'cni' => ['required', 'string'],
            'antecedent_medicaux' => ['string'],
            'antecedent_chirugicaux' => ['string'],
            'antecedent_familiaux' => ['string'],
            'enabled' => ['required'],
        ];
    }
}
