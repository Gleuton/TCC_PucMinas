<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Services;

use App\Models\UserType;

class UserTypeService
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
         * @var UserType $userType
         */
        $userType = UserType::find($this->data['id']);

        if (null !== $userType) {
            return $userType->update($this->data);
        }

        $userType = new UserType($this->data);
        return $userType->save();
    }
}
