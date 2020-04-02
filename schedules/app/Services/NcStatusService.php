<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Services;

use App\Models\NcStatus;

class NcStatusService
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        /**
         * @var NcStatus $ncStatus
         */
        $ncStatus = NcStatus::find($this->data['id']);

        if (null !== $ncStatus) {
            return $ncStatus->update($this->data);
        }

        $ncStatus = new NcStatus($this->data);
        return $ncStatus->save();
    }
}
