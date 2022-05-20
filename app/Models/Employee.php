<?php

namespace App\Models;

use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Employee\EmployeeResource;
use App\Http\Resources\Employee\EmployeeCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    public $oneItem = EmployeeResource::class;
    public $allItems = EmployeeCollection::class;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Department::class);
    }
    
    public function operator()
    {
        return $this->belongsTo(User::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Projects::class, 'assign_projects');
    }

    public function timesheet()
    {
        return $this->hasMany(Timesheet::class);
    }

    public function payslips()
    {
        return $this->hasMany(Payslip::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class);
    }

    public function projectReports()
    {
        return $this->hasMany(ProjectReport::class);
    }

    public function benefits()
    {
        return $this->morphMany(Benefits::class, 'benefitable');
    }

    public function deductions()
    {
        return $this->morphMany(Deduction::class, 'deductable');
    }
}
