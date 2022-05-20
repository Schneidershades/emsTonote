<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Timesheet\TimesheetResource;
use App\Http\Resources\Timesheet\TimesheetCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Timesheet extends Model
{
    use HasFactory;

    public $oneItem = TimesheetResource::class;
    public $allItems = TimesheetCollection::class;

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
