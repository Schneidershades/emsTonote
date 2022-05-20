<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Benefit;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBenefitFormRequest;
use App\Http\Requests\Admin\UpdateBenefitFormRequest;

class BenefitController extends Controller
{
    public function index()
    {
        return $this->showAll(Benefit::all());
    }

    public function store(StoreBenefitFormRequest $request)
    {
        return $this->showAll(Benefit::create($request->validated()));
    }

    public function show(Benefit $benefit)
    {
        return $this->showOne($benefit);
    }

    public function update(UpdateBenefitFormRequest $request, Benefit $benefit)
    {
        $benefit->update($request->validated());
        return $this->showOne($benefit);
    }

    public function delete(Benefit $benefit)
    {
        return $benefit->delete() ? $this->showMessage('benefit deleted') :  $this->errorResponse('failed to delete benefit', 409);
    }
}
