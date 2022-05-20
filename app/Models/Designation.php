<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Designation\DesignationResource;
use App\Http\Resources\Designation\DesignationCollection;

class Designation extends Model
{
    use HasFactory;

    public $oneItem = DesignationResource::class;
    public $allItems = DesignationCollection::class;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function superior()
    {
        return $this->belongsTo(Employee::class);
    }
}
