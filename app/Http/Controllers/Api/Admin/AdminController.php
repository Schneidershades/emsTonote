<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserFormRequest;
use App\Http\Requests\Admin\UpdateUserFormRequest;

class AdminController extends Controller
{
    public function index()
    {
        return $this->showAll(User::all());
    }

    public function store(StoreUserFormRequest $request)
    {
        return $this->showAll(User::create($request->validated()));
    }

    public function show(User $user)
    {
        return $this->showOne($user);
    }

    public function update(UpdateUserFormRequest $request, User $user)
    {
        $user->update($request->validated());
        return $this->showOne($user);
    }

    public function delete(User $user)
    {
        return $user->delete() ? $this->showMessage('user deleted') :  $this->errorResponse('failed to delete user', 409);
    }
}
