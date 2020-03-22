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
        $processData = $this->data['process'];
        /**
         * @var Process $process
         */
        $process = Process::find($processData['id']);

        if (null !== $process) {
            var_dump($process);
            return $process->update($processData);
        }

        $process = new Process($processData);
        return $process->save();
    }
}
