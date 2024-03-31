<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTiresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'Tire_serial' => 'required|regex:/^[a-zA-Z0-9]{10}$/',
            'TireSize'    => 'required|numeric',
            'TireAmount'  => 'required|numeric',
            'TirePrice'   => 'required',
            'TireCountry' => 'required|alpha',
            'TireModel'   => 'required',
            'quantity_available' => 'required|numeric',
            'TireDate'    => 'required|date',
        ];
    }
}
