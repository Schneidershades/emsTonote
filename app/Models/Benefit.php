<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Benefit\BenefitResource;
use App\Http\Resources\Benefit\BenefitCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Benefit extends Model
{
    use HasFactory;

    public $oneItem = BenefitResource::class;
    public $allItems = BenefitCollection::class;

    public function benefitable()
    {
        return $this->morphTo();
    }
}
