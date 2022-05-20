<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDepartmentFormRequest;
use App\Http\Requests\Admin\UpdateDepartmentFormRequest;

class DepartmentController extends Controller
{
    public function index()
    {
        return $this->showAll(Department::all());
    }

    public function store(StoreDepartmentFormRequest $request)
    {
        return $this->showAll(Department::create($request->validated()));
    }

    public function show(Department $department)
    {
        return $this->showOne($department);
    }

    public function update(UpdateDepartmentFormRequest $request, Department $department)
    {
        $department->update($request->validated());
        return $this->showOne($department);
    }

    public function delete(Department $department)
    {
        return $department->delete() ? $this->showMessage('department deleted') :  $this->errorResponse('failed to delete department', 409);
    }
}
