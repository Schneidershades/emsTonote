<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Leave;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLeaveFormRequest;
use App\Http\Requests\Admin\UpdateLeaveFormRequest;

class LeaveController extends Controller
{
    public function index()
    {
        return $this->showAll(Leave::all());
    }

    public function store(StoreLeaveFormRequest $request)
    {
        return $this->showAll(Leave::create($request->validated()));
    }

    public function show(Leave $leave)
    {
        return $this->showOne($leave);
    }

    public function update(UpdateLeaveFormRequest $request, Leave $leave)
    {
        $leave->update($request->validated());
        return $this->showOne($leave);
    }

    public function delete(Leave $leave)
    {
        return $leave->delete() ? $this->showMessage('leave deleted') :  $this->errorResponse('failed to delete leave',409);
    }
}
