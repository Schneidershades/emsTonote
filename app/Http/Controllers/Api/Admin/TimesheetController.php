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

    public function update(UpdateTimesheetFormRequest $request, Timesheet $timesheet)
    {
        $timesheet->update($request->validated());
        return $this->showOne($timesheet);
    }

    public function delete(Timesheet $timesheet)
    {
        return $timesheet->delete() ? $this->showMessage('timesheet deleted') :  $this->errorResponse('failed to delete timesheet', 409);
    }
}
