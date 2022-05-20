<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLeaveRequestFormRequest extends FormRequest
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
            'employee_id' => 'nullable|int|exists:employees,id',
            'leave_start' => 'required|date',
            'leave_end' => 'required|date',
            'approved' => 'nullable|boolean',
            'salary_deduction' => 'required|boolean',
            'salary_deduction_amount' => 'required|numeric|min:1',
        ];
    }
}
