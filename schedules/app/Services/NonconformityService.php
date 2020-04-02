<?php

namespace App\Services;

use App\Models\NcType;
use App\Models\Nonconformity;

class NonconformityService
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
         * @var Nonconformity $nc
         */
        $nc = Nonconformity::find($this->data['id']);

        if (null !== $nc) {
            return $nc->update($this->data);
        }

        $nc = new Nonconformity($this->data);
        return $nc->save();
    }
}
