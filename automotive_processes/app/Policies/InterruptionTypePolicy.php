<?php

namespace App\Policies;

use App\Models\User;

class InterruptionTypePolicy
{
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function view(User $user): bool
    {
        return $user->isAdmin() || $user->isProcessManager();
    }

    public function update(User $user): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user): bool
    {
        return $user->isAdmin();
    }
}
