<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Services;

use App\Models\User;

class UserService
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
         * @var User $user
         */
        $user = User::find($this->data['id']);

        if (null !== $user) {
            return $user->update($this->data);
        }

        $user = new User($this->data);
        return $user->save();
    }
}
