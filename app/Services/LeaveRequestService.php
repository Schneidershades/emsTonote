<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Deduction;
use App\Traits\Api\ApiResponder;

class LeaveRequestService 
{
    use ApiResponder;

    public function processLeaveRequest($employee, $leaveRequest)
    {
        if($leaveRequest->approved != true){
            return null;
        }


        $this->checkLeaveDays($employee, $leaveRequest);

        
        
        if($employee->leave->salary_deduction == true){

            Deduction::create([
                'employee_id' => $employee->id,
                'deductable_id' => $leaveRequest->id,
                'deductable_type' => 'leaveRequest',
                'name' => 'Leave Deduction',
                'unit' => 1,
                'measure' => 'currency',
                'frequency' => 'once',
                'period' => $leaveRequest->leave_start,
                'value' => $leaveRequest->salary_deduction_amount,
                'total' => $leaveRequest->salary_deduction_amount,
            ]);

        }
    }

    public function checkLeaveDays($employee, $leaveRequest)
    {
        $leaveStartLimit = Carbon::parse($employee->leave->scheduled_date);
        $leaveEndLimit = $leaveStartLimit->addYear();


        $remaining_days = $employee->leave->days - $employee->leaveRequests->whereBetween('leave_start', [$leaveStartLimit, $leaveEndLimit])->count();

        if($remaining_days >= 0){
            return $this->errorResponse('There are no leave days allocated at the moment', 409);
        }

    }
}