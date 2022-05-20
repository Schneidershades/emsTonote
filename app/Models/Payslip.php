<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Payslip\PayslipResource;
use App\Http\Resources\Payslip\PayslipCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payslip extends Model
{
    use HasFactory;

    public $oneItem = PayslipResource::class;
    public $allItems = PayslipCollection::class;
    
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
