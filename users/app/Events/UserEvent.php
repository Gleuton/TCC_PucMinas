<?php

namespace App\Events;

use App\Models\User;

class UserEvent extends Event
{
    private User $model;

    /**
     * Create a new event instance.
     *
     * @param User $ncStatus
     */
    public function __construct(User $ncStatus)
    {
        $this->model = $ncStatus;
    }

    /**
     * @return User
     */
    public function getModel(): User
    {
        return $this->model;
    }
}
