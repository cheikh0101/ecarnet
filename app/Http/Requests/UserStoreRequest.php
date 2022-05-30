<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'telephone' => ['required', 'string'],
            'matricule' => ['required', 'string'],
            'genre' => ['required', 'string'],
            'email' => ['required', 'email'],
            'email_verified_at' => [''],
            'password' => ['required', 'password'],
            'remember_token' => ['string', 'max:100'],
        ];
    }
}
