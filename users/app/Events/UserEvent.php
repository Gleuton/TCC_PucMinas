<?php

namespace App\Events;

use App\Models\User;

class UserEvent extends Event
{
    private User $model;

    /**
     * Create a new event instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @return User
     */
    public function getModel(): User
    {
        return $this->model;
    }
}
