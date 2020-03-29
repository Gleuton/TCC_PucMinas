<?php

namespace App\Events;

use App\Models\ImpactedProcess;

class ImpactedProcessEvent extends Event
{
    private ImpactedProcess $model;

    /**
     * Create a new event instance.
     *
     * @param ImpactedProcess $ncStatus
     */
    public function __construct(ImpactedProcess $ncStatus)
    {
        $this->model = $ncStatus;
    }

    /**
     * @return ImpactedProcess
     */
    public function getModel(): ImpactedProcess
    {
        return $this->model;
    }
}
