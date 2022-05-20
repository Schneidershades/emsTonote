<?php

namespace App\Http\Controllers\Api\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return $this->showOne(
            Employee::where('user_id', auth()->user()->id)
                ->with(
                    'employee', 
                    'timesheets', 
                    'leaves', 
                    'leaveRequests',
                    'designation', 
                    'department', 
                    'projects', 
                    'project.projectReports',
                    'benefits',
                    'deductions'
                )->get()
        );
    }
}
