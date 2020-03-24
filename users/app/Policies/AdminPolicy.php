<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

}
