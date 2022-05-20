<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Project\ProjectResource;
use App\Http\Resources\Project\ProjectCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    public $oneItem = ProjectResource::class;
    public $allItems = ProjectCollection::class;

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'assign_projects');
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
