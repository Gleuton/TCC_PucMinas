<?php

namespace App\Events;

use App\Models\NcStatus;
use App\Models\NcType;

class NcTypeEvent extends Event
{
    private NcType $model;

    /**
     * Create a new event instance.
     *
     * @param NcType $ncType
     */
    public function __construct(NcType $ncType)
    {
        $this->model = $ncType;
    }

    /**
     * @return NcType
     */
    public function getModel(): NcType
    {
        return $this->model;
    }
}
