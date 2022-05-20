<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Department\DepartmentResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Department\DepartmentCollection;

class Department extends Model
{
    use HasFactory;

    public $oneItem = DepartmentResource::class;
    public $allItems = DepartmentCollection::class;

    public function operator()
    {
        return $this->belongsTo(User::class);
    }
}
