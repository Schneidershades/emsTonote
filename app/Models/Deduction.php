<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Deduction\DeductionResource;
use App\Http\Resources\Deduction\DeductionCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deduction extends Model
{
    use HasFactory;

    public $oneItem = DeductionResource::class;
    public $allItems = DeductionCollection::class;

    public function deductable()
    {
        return $this->morphTo();
    }
}
