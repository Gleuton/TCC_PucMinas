<?php

namespace App\Events;

use App\Models\Process;

class ProcessEvent extends Event
{
    private Process $model;

    /**
     * Create a new event instance.
     *
     * @param Process $process
     */
    public function __construct(Process $process)
    {
        $this->model = $process;
    }

    /**
     * @return Process
     */
    public function getModel(): Process
    {
        return $this->model;
    }
}
