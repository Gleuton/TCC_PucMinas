<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchedulePolicy
{
    use HandlesAuthorization;

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
