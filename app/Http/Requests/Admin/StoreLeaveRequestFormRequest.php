<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeaveRequestFormRequest extends FormRequest
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

    public function rules()
    {
        return [
            'employee_id' => 'nullable|int|exists:employees,id',
            'leave_start' => 'required|date',
            'leave_end' => 'required|date',
            'approved' => 'nullable|boolean',
            'salary_deduction' => 'required|boolean',
            'salary_deduction' => 'required|numeric|min:1',
        ];
    }
}
