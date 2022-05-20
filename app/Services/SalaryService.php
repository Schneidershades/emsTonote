<?php

namespace App\Services;

use App\Models\Payslip;
use Carbon\Carbon;

class SalaryService 
{
    public function processSalary($employee) : float
    {
        $benefits = $employee->benefits->where('measure', 'amount')
            ->orWhere('frequency', 'monthly')
            ->orWhere('period', Carbon::now()->format('M, Y'))
            ->sum('total');

        $deductions = $employee->deductions->where('measure', 'amount')
            ->orWhere('frequency', 'monthly')
            ->orWhere('period', Carbon::now()->format('M, Y'))
            ->sum('total');

        $basic_salary = $employee->basic_salary;

        $payslip = Payslip::create([
            'employee_id' => $employee->id,
            'basic_salary' => $basic_salary,
            'benefits' => $benefits,
            'period' => Carbon::now()->format('M, Y'),
        ]);

        return $basic_salary + $benefits - $deductions;
    }
}
