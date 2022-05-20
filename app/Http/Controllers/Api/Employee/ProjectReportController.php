<?php

namespace App\Http\Controllers\Api\Employee;

use App\Models\ProjectReport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProjectReportFormRequest;
use App\Http\Requests\Admin\UpdateProjectReportFormRequest;

class ProjectReportController extends Controller
{
    public function index()
    {
        return $this->showAll(ProjectReport::all());
    }

    public function store(StoreProjectReportFormRequest $request)
    {
        return $this->showAll(ProjectReport::create($request->validated()));
    }

    public function show(ProjectReport $projectReport)
    {
        return $this->showOne($projectReport);
    }

    public function update(UpdateProjectReportFormRequest $request, ProjectReport $projectReport)
    {
        $projectReport->update($request->validated());
        return $this->showOne($projectReport);
    }
}
