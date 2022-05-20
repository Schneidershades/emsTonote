<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProjectFormRequest;
use App\Http\Requests\Admin\UpdateProjectFormRequest;

class ProjectController extends Controller
{
    public function index()
    {
        return $this->showAll(Project::all());
    }

    public function store(StoreProjectFormRequest $request)
    {
        $project = Project::create($request->validated());
        $project->plans()->sync($request['employees']);
        return $this->showAll($project);
    }

    public function show(Project $project)
    {
        return $this->showOne($project);
        
    }

    public function update(UpdateProjectFormRequest $request, Project $project)
    {
        $project->update($request->validated());
        $project->plans()->sync($request['employees']);
        return $this->showOne($project);
    }

    public function delete(Project $project)
    {
        return $project->delete() ? $this->showMessage('project deleted') :  $this->errorResponse('failed to delete project', 409);
    }
}
