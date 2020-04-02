<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Services;

use App\Models\NcType;

class NcTypeService
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
         * @var NcType $ncType
         */
        $ncType = NcType::find($this->data['id']);

        if (null !== $ncType) {
            return $ncType->update($this->data);
        }

        $ncType = new NcType($this->data);
        return $ncType->save();
    }
}
