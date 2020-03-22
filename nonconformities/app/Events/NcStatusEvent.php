<?php

namespace App\Events;

use App\Models\NcStatus;

class NcStatusEvent extends Event
{
    private NcStatus $model;

    /**
     * Create a new event instance.
     *
     * @param NcStatus $ncStatus
     */
    public function __construct(NcStatus $ncStatus)
    {
        $this->model = $ncStatus;
    }

    /**
     * @return NcStatus
     */
    public function getModel(): NcStatus
    {
        return $this->model;
    }
}
