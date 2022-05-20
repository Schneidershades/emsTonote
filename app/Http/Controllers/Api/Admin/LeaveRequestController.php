<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\LeaveRequest;
use App\Http\Controllers\Controller;
use App\Services\LeaveRequestService;
use App\Http\Requests\Admin\StoreLeaveRequestFormRequest;
use App\Http\Requests\Admin\UpdateLeaveRequestFormRequest;

class LeaveRequestRequestController extends Controller
{
    public function index()
    {
        return $this->showAll(LeaveRequest::all());
    }

    public function store(StoreLeaveRequestFormRequest $request)
    {
        $leaveRequest = LeaveRequest::create($request->validated());

        (new LeaveRequestService())->checkLeaveDays($leaveRequest->employee, $leaveRequest);

        return $this->showOne($leaveRequest);
    }

    public function show(LeaveRequest $leaveRequest)
    {
        return $this->showOne($leaveRequest);
    }

    public function update(UpdateLeaveRequestFormRequest $request, LeaveRequest $leaveRequest)
    {
        $leaveRequest->update($request->validated());

        (new LeaveRequestService())->processLeaveRequest($leaveRequest->employee, $leaveRequest);

        return $this->showOne($leaveRequest);
    }

    public function delete(LeaveRequest $leaveRequest)
    {
        return $leaveRequest->delete() ? $this->showMessage('leave deleted request') :  $this->errorResponse('failed to delete leave', 409);
    }
}
