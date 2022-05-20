<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Designation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDesignationFormRequest;
use App\Http\Requests\Admin\UpdateDesignationFormRequest;

class DesignationController extends Controller
{
    public function index()
    {
        return $this->showAll(Designation::all());
    }

    public function store(StoreDesignationFormRequest $request)
    {
        return $this->showAll(Designation::create($request->validated()));
    }

    public function show(Designation $designation)
    {
        return $this->showOne($designation);
    }

    public function update(UpdateDesignationFormRequest $request, Designation $designation)
    {
        $designation->update($request->validated());
        return $this->showOne($designation);
    }

    public function delete(Designation $designation)
    {
        return $designation->delete() ? $this->showMessage('designation deleted') :  $this->errorResponse('failed to delete designation', 409);
    }
}
