<?php

namespace App\Events;

use App\Models\Interruption;

class InterruptionEvent extends Event
{
    private Interruption $model;

    /**
     * Create a new event instance.
     *
     * @param Interruption $interruption
     */
    public function __construct(Interruption $interruption)
    {
        $this->model = $interruption;
    }

    /**
     * @return Interruption
     */
    public function getModel(): Interruption
    {
        return $this->model;
    }
}
