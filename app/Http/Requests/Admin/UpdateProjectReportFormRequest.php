<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectReportFormRequest extends FormRequest
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
            'approved' => 'required|boolean',
            'employee_id' => 'int|exists:employees,id',
            'project_id' => 'int|exists:projects,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'is_critical_path' => 'required|boolean',
            'is_continous' => 'required|boolean',
            'dependent_work_activity_id' => 'int|exists:projects,id',
            'blocked_work_activity_id' => 'int|exists:projects,id',
            'status' => 'required|string',
            'is_blocked' => 'required|boolean',
            'is_delayed' => 'required|boolean',
            'is_completed' => 'required|boolean',
        ];
    }
}
