<?php

namespace App\Events;

use App\Models\NcStatus;
use App\Models\Nonconformity;

class NonconformityEvent extends Event
{
    private Nonconformity $model;

    /**
     * Create a new event instance.
     *
     * @param Nonconformity $ncStatus
     */
    public function __construct(Nonconformity $ncStatus)
    {
        $this->model = $ncStatus;
    }

    /**
     * @return Nonconformity
     */
    public function getModel(): Nonconformity
    {
        return $this->model;
    }
}
