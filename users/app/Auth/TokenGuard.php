<?php

namespace App\Auth;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\TokenGuard as Guard;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TokenGuard extends Guard
{
    /**
     * @param array $credentials
     *
     * @return User|bool
     * @throws \Exception
     */
    public function attempt(array $credentials)
    {
        /**
         * @var User $user
         */
        $user = $this->provider->retrieveByCredentials($credentials);

        if ($user
            && $this->provider->validateCredentials(
                $user,
                $credentials
            )
        ) {
            $this->generateToken($user);
            return $user;
        }
        return false;
    }

    /**
     * @param User $user
     *
     * @throws \Exception
     */
    private function generateToken(User $user): void
    {
        $user->api_token = '';
        for ($i = 0; $i <= 6; $i++) {
            $user->api_token .= Hash::make(Str::random('64'));
        }

        $user->api_token_expiration = $this->getTokenExpiration();

        $user->save();
    }

    /**
     * @return int
     * @throws \Exception
     */
    private function getTokenExpiration(): int
    {
        $expiration = new Carbon();
        $expiration->addHours(2);
        return $expiration->getTimestamp();
    }

    public function check(): bool
    {
        if (null !== $this->user()) {
            $api_token_expiration = $this->user()
                ->api_token_expiration
                ->getTimestamp();

            return $api_token_expiration > Carbon::now()->getTimestamp();
        }
        return false;
    }
}
