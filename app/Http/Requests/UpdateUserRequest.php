<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends StoreUserRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    //Criação de regras personalizadas para update
    {
        $rules = parent::rules();

        //senha opcional no update
        $rules['password'] = [
            'nullable',
            'min:6',
            'max:20'
        ];
        return $rules; 
    }
}
