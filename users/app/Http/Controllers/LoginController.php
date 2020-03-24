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

        /**
         * @var User $user
         */
        $user = Auth::attempt(
            $request->only(['login', 'password'])
        );

        if (!$user) {
            return response()->json(
                ['message' => 'Invalid credentials'],
                400
            );
        }

        return response()->json(
            [
                'api_token'            => $user->api_token,
                'api_token_expiration' => $user->api_token_expiration,
            ],
            200
        );
    }
}
