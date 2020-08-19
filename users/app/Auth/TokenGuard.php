<?php

namespace App\Auth;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\TokenGuard as Guard;
use Illuminate\Support\Str;

class TokenGuard extends Guard
{
    /**
     * @param array $credentials
     *
     * @return User
     * @throws \Exception
     */
    public function attempt(array $credentials): ?User
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
        return null;
    }

    public function rememberToken(): ?User
    {
        if ($this->check()) {
            $this->generateToken($this->user);
            return $this->user;
        }
        return null;
    }

    /**
     * @param User $user
     *
     * @throws \Exception
     */
    private function generateToken(User $user): void
    {
        $user->api_token = '';
        $user->api_token .= Str::random('32') . '.';
        $user->api_token .= Str::random('128') . '.';
        $user->api_token .= Str::random('32');

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
