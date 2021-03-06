<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Timesheet;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTimesheetFormRequest;
use App\Http\Requests\Admin\UpdateTimesheetFormRequest;

class TimesheetController extends Controller
{
    public function index()
    {
        return $this->showAll(Timesheet::all());
    }

    public function store(StoreTimesheetFormRequest $request)
    {
        return $this->showAll(Timesheet::create($request->validated()));
    }

    public function show(Timesheet $timesheet)
    {
        return $this->showOne($timesheet);
    }
}
