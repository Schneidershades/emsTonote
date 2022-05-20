<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\ProjectReport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProjectReportFormRequest;
use App\Http\Requests\Admin\UpdateProjectReportFormRequest;

class ProjectReportReportController extends Controller
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

    public function delete(ProjectReport $projectReport)
    {
        return $projectReport->delete() ? $this->showMessage('projectReport deleted') :  $this->errorResponse('failed to delete projectReport', 409);
    }
}
