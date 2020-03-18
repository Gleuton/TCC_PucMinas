<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\NcType;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class NcTypeController extends Controller
{
    /**
     * NcTypeController constructor.
     *
     * @param NcType|Builder $model
     */
    public function __construct(NcType $model)
    {
        $this->model = $model;
        $this->api = 'api::ncType';
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        Cache::forget($this->api);
        $ncType = new NcType($request->all());
        $ncType->save();
        return response()->json($ncType, 201);
    }
}
