<?php

namespace App\Models;

use App\Models\Project;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Project\ProjectReportResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Project\ProjectReportCollection;

class ProjectReport extends Model
{
    use HasFactory;

    public $oneItem = ProjectReportResource::class;
    public $allItems = ProjectReportCollection::class;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function dependency()
    {
        return $this->belongsTo(Project::class, 'dependent_work_activity_id');
    }

    public function blocker()
    {
        return $this->belongsTo(Project::class, 'blocked_work_activity_id');
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
