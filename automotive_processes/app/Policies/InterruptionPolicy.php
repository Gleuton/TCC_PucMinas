<?php

namespace App\Policies;

use App\Models\User;

class InterruptionPolicy
{
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isProcessManager();
    }

    public function view(User $user): bool
    {
        return $user->isAdmin() || $user->isProcessManager();
    }

    public function update(User $user): bool
    {
        return $user->isAdmin() || $user->isProcessManager();
    }

    public function delete(User $user): bool
    {
        return $user->isAdmin() || $user->isProcessManager();
    }
}
