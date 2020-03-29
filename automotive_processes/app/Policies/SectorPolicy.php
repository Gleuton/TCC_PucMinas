<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectorPolicy
{
    use HandlesAuthorization;

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
