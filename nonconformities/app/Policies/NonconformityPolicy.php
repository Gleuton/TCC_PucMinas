<?php

namespace App\Policies;

use App\Models\User;

class NonconformityPolicy
{
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isQualityManager();
    }

    public function view(User $user): bool
    {
        return $user->isAdmin() || $user->isQualityManager();
    }

    public function update(User $user): bool
    {
        return $user->isAdmin() || $user->isQualityManager();
    }

    public function delete(User $user): bool
    {
        return $user->isAdmin() || $user->isQualityManager();
    }
}
