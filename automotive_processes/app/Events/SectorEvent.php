<?php

namespace App\Events;

use App\Models\Sector;

class SectorEvent extends Event
{
    private Sector $model;

    /**
     * Create a new event instance.
     *
     * @param Sector $sector
     */
    public function __construct(Sector $sector)
    {
        $this->model = $sector;
    }

    /**
     * @return Sector
     */
    public function getModel(): Sector
    {
        return $this->model;
    }
}
