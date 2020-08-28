<?php

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
                'name'         => 'required|string|max:255',
                'login'        => 'required|unique:users|max:255',
                'password'     => 'required|confirmed|max:255',
                'user_type_id' => 'required|confirmed|max:36|min:36',
            ]
        );
        return parent::store($request);
    }

    /**
     * @param Request $request
     * @param string  $id
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $this->validate(
            $request,
            [
                'name'         => 'sometimes|required|string|max:255',
                'login'        => 'sometimes|required|unique:users|max:255',
                'password'     => 'sometimes|required|confirmed|max:255',
                'user_type_id' => 'sometimes|required|confirmed|max:36|min:36',
            ]
        );
        return parent::update(
            $request,
            $id
        );
    }
}
