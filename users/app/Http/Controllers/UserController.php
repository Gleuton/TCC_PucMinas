<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * ProcessController constructor.
     *
     * @param User|Builder $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
        $this->api = 'api::user';
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $this->validate(
            $request,
            [
                'name'     => 'required|string',
                'login'    => 'required|unique:users',
                'password' => 'required|confirmed',
            ]
        );
        return parent::store($request);
    }
}
