<?php

namespace App\Observers\User;

use App\Models\User;

class UserObserver
{
    public function creating(User $user)
    {
        $user->password = bcrypt($user->password);
    }
}
