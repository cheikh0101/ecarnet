<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RendezvouStoreRequest extends FormRequest
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
            'date' => ['required', 'string'],
            'presence' => ['string'],
            'description' => ['string'],
            'dossier_id' => ['required', 'integer', 'exists:dossiers,id'],
        ];
    }
}
