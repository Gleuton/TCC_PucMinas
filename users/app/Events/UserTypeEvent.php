<?php

namespace App\Events;

use App\Models\UserType;

class UserTypeEvent extends Event
{
    private UserType $model;

    /**
     * Create a new event instance.
     *
     * @param UserType $ncStatus
     */
    public function __construct(UserType $ncStatus)
    {
        $this->model = $ncStatus;
    }

    /**
     * @return UserType
     */
    public function getModel(): UserType
    {
        return $this->model;
    }
}
