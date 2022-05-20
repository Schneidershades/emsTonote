<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectFormRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'goals' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'approved' => 'required|boolean',
            'employees.*.employee_id' => 'int|exists:employees,id',
        ];
    }
}
