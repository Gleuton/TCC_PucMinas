<?php

namespace App\Policies;

use App\Models\User;

class ProcessPolicy
{
    public function create(User $user): bool
    {
        return false;
    }

    public function view(User $user): bool
    {
        return $user->isAdmin() || $user->isQualityManager();
    }

    public function update(User $user): bool
    {
        return false;
    }

    public function delete(User $user): bool
    {
        return $user->isAdmin();
    }
}
