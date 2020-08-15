<?php

namespace App\Events;

use App\Models\UserType;

class UserTypeEvent extends Event
{
    private UserType $model;

    /**
     * Create a new event instance.
     *
     * @param UserType $type
     */
    public function __construct(UserType $type)
    {
        $this->model = $type;
    }

    /**
     * @return UserType
     */
    public function getModel(): UserType
    {
        return $this->model;
    }
}
