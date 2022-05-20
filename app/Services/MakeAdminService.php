<?php

namespace App\Services;

use App\Models\User;

class MakeAdminService 
{
    public function createUserAccount($employee) 
    {
        User::create([
            'name' => $employee->first_name,
            'email' => $employee->first_name,
            'role' => $employee->system_role,
            'password' => substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 8)
        ]);

    }
}
