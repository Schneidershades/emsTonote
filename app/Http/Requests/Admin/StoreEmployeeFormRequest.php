<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'middle_name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|string',
            'sex' => 'required|string',
            'dob' => 'required|date',
            'pob' => 'required|date',
            'profession' => 'required|string',
            'user_id' => 'nullable|int|exists:users,id',
            'designation_id' => 'nullable|int|exists:designations,id',
            'department_id' => 'nullable|int|exists:departments,id',
            'qualification' => 'required|string',
            'position' => 'required|string',
            'confirmed' => 'required|boolean',
            'pension_managers' => 'required|boolean',
            'initial_appointment_date' => 'required|date',
            'present_appointment_date' => 'required|date',
            'employment_type' => 'required|string',
            'current_location' => 'required|string',
            'previous_location' => 'required|string',
            'bank_account_number' => 'required|string',
            'bank_name' => 'required|string',
            'nationality' => 'required|string',
            'state' => 'required|string',
            'lga' => 'required|string',
            'marital_status' => 'required|string',
            'number_of_dependants' => 'required|integer',
            'phone_number' => 'required|string',
            'marital_status' => 'required|string',
            'number_of_dependants' => 'required|int',
            'residential_address' => 'required|string',
            'contact_address' => 'required|string',
            'height' => 'required|string',
            'weight' => 'required|string',
            'genotype' => 'required|string',
            'blood_group' => 'required|string',
            'state_deformity' => 'required|string',
            'base_salary' => 'required|numeric|min:0',
        ];
    }
}
