<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\UserType;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    /**
     * UserTypeController constructor.
     *
     * @param UserType|Builder $model
     */
    public function __construct(UserType $model)
    {
        $this->model = $model;
        $this->api = 'api::userType';
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        Cache::forget($this->api);
        $userType = new UserType($request->all());
        $userType->save();
        return response()->json($userType, 201);
    }
}
