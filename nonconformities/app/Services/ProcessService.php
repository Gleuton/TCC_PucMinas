<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Services;

use App\Models\Process;

class ProcessService
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
         * @var Process $process
         */
        $process = Process::find($this->data['id']);

        if (null !== $process) {
            return $process->update($this->data);
        }

        $process = new Process($this->data);
        return $process->save();
    }
}
