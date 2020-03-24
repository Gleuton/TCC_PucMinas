<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminPolicy
{
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

}
