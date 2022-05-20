<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Controller;

class PayslipController extends Controller
{
    public function index()
    {
        return $this->showAll(auth()->user()->employee->payslips);
    }
}
