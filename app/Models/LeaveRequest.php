<?php

namespace App\Models;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Leave\LeaveRequestResource;
use App\Http\Resources\Leave\LeaveRequestCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveRequest extends Model
{
    use HasFactory;

    public $oneItem = LeaveRequestResource::class;
    public $allItems = LeaveRequestCollection::class;

    public function operator()
    {
        return $this->belongsTo(User::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
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
