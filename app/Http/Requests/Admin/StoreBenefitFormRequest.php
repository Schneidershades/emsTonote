<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreBenefitFormRequest extends FormRequest
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
            'employee_id' => 'required|int|exists:employees,id',
            'benefitable_id' => 'nullable|int|exists:employees,id',
            'benefitable_type' => 'nullable|string',
            'name' => 'required|string',
            'description' => 'required|string',
            'unit' => 'required|int|min:1',
            'measure' => 'required|string',
            'frequency' => 'required|string',
            'period' => 'required|string',
            'value' => 'required|numeric|min:1',
        ];
    }
}
