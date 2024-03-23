<?php

namespace App\Http\Requests;

use App\Rules\PlateRole;
use Illuminate\Foundation\Http\FormRequest;

class AddCarRequest extends FormRequest
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
                'car_brand' => 'required',
                'car_model' => 'required',
                'car_service' =>'required',
                'structure_no' => 'required|size:17',
                'car_counter' =>'required',
                'car_name' =>'required|max:15',
                'u_name' => 'required:max:240',
                'u_phone' => 'required|integer',
                'car_plate' => ['required', new PlateRole],
                'comment' => '',

        ];
    }
}
