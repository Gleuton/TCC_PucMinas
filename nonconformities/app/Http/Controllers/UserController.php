<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

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
     */
    public function store(Request $request): JsonResponse
    {
        Cache::forget($this->api);
        $Process = new User($request->all());
        $Process->save();
        return response()->json($Process, 201);
    }
}
