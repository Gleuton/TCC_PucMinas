<?php

namespace App\Events;

use App\Models\ImpactedProcess;

class ImpactedProcessEvent extends Event
{
    private ImpactedProcess $model;

    /**
     * Create a new event instance.
     *
     * @param ImpactedProcess $impactedProcess
     */
    public function __construct(ImpactedProcess $impactedProcess)
    {
        $this->model = $impactedProcess;
    }

    /**
     * @return ImpactedProcess
     */
    public function getModel(): ImpactedProcess
    {
        return $this->model;
    }
}
