<?php

namespace App\Observers\Department;

use App\Models\Department;
use Illuminate\Support\Str;

class DepartmentObserver
{
    public function creating(Department $department)
    {
        $department->slug = Str::slug($department->name);
    }
}
