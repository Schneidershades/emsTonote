<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Deduction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDeductionFormRequest;
use App\Http\Requests\Admin\UpdateDeductionFormRequest;

class DeductionController extends Controller
{
    public function index()
    {
        return $this->showAll(Deduction::all());
    }

    public function store(StoreDeductionFormRequest $request)
    {
        return $this->showAll(Deduction::create($request->validated()));
    }

    public function show(Deduction $deduction)
    {
        return $this->showOne($deduction);
    }

    public function update(UpdateDeductionFormRequest $request, Deduction $deduction)
    {
        $deduction->update($request->validated());
        return $this->showOne($deduction);
    }

    public function delete(Deduction $deduction)
    {
        return $deduction->delete() ? $this->showMessage('employee deduction deleted') :  $this->errorResponse('failed to delete employee deduction', 409);
    }
}
