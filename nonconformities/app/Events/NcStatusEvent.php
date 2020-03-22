<?php

namespace App\Events;

use App\Models\NcStatus;

class NcStatusEvent extends Event
{
    private NcStatus $ncStatus;

    /**
     * Create a new event instance.
     *
     * @param NcStatus $ncStatus
     */
    public function __construct(NcStatus $ncStatus)
    {
        $this->ncStatus = $ncStatus;
    }

    /**
     * @return NcStatus
     */
    public function getModel(): NcStatus
    {
        return $this->ncStatus;
    }
}
