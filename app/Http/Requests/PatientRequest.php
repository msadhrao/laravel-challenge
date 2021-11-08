<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{
    protected $redirect = '/patient/create';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:255|',
            'address' => 'required|max:1000',
            'phone' => 'required|digits_between:8,12',
            'email' => 'required|email',
            'symptoms' => '',
        ];
    }
}
