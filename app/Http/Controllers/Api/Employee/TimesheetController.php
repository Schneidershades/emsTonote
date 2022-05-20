<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Controller;

class TimesheetController extends Controller
{
    public function index()
    {
        return $this->showAll(auth()->user()->employee->projectReports);
    }
}
