<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    /**
     * ProcessController constructor.
     *
     * @param Process|Builder $model
     */
    public function __construct(Process $model)
    {
        $this->model = $model;
        $this->api = 'api::process';
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        Cache::forget($this->api);
        $Process = new Process($request->all());
        $Process->save();
        return response()->json($Process, 201);
    }
}
