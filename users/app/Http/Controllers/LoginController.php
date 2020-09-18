<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\Controller;

class LoginController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(Request $request): JsonResponse
    {
        $this->validate(
            $request,
            [
                'login'    => 'required',
                'password' => 'required'
            ]
        );

        $user = Auth::attempt(
            $request->only(['login', 'password'])
        );

        return $this->response($user);
    }

    public function loadSession(): JsonResponse
    {
        /** @var User $user */
        $user = Auth::user();
        return $this->response($user);
    }

    /**
     * @param User|Bool $user
     *
     * @return JsonResponse
     */
    private function response($user): JsonResponse
    {
        if (!$user || !($user instanceof User)) {
            return response()->json(
                ['message' => 'Credenciais inválidas'],
                400
            );
        }

        return response()->json(
            [
                'api_token'            => $user->api_token,
                'api_token_expiration' => $user->api_token_expiration,
                'user'                 => [
                    'user_id' => $user->id,
                    'name'    => $user->name,
                    'login'   => $user->login,
                    'type'    => $user->userType->type,
                ]
            ],
            200
        );
    }
}
