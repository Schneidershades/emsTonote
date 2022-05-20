<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEmployeeFormRequest;
use App\Http\Requests\Admin\UpdateEmployeeFormRequest;
use App\Services\MakeAdminService;

class EmployeeController extends Controller
{
    public function index()
    {
        return $this->showAll(Employee::all());
    }

    public function store(StoreEmployeeFormRequest $request)
    {
        $employee = Employee::create($request->validated());
        (new MakeAdminService())->createUserAccount($employee);
        return $this->showAll($employee);
        
    }

    public function show(Employee $employee)
    {
        return $this->showOne($employee);
    }

    public function update(UpdateEmployeeFormRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return $this->showOne($employee);
    }

    public function delete(Employee $employee)
    {
        return $employee->delete() ? $this->showMessage('employee deleted') :  $this->errorResponse('failed to delete employee', 409);
    }
}
