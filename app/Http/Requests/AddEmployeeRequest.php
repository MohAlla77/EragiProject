<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddEmployeeRequest extends FormRequest
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
                   
            'e-Email'=>'required|Email',
            'name'=>'required|min:6|max:20',
            'phone_number'=>'nullable|regex:/^[0-9]+$/|digits:10',
            'salary' => 'required|numeric',
            'department' =>  'required|string',
            'direct_day' => 'required|date',
            'address'=>'required|string',
            'workplace' =>  'required|string',
            'marital_status' => 'required|in:Married,Single',
            'nationality' =>  'required|string',
            'image' =>  'mimes:jpg,png,jpeg|max:5048',

        ];
    }
}
