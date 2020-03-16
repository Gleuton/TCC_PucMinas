<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    private const API = 'api::process';
    private Process $model;

    /**
     * ProcessController constructor.
     *
     * @param Process|Builder $model
     */
    public function __construct(Process $model)
    {
        $this->model = $model;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $minutes = Carbon::now()->addMinutes(10);

        $Process = Cache::remember(
            self::API,
            $minutes,
            function () {
                return $this->model::all();
            }
        );
        return response()->json($Process, 200);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        Cache::forget(self::API);
        $Process = new Process($request->all());
        $Process->save();
        return response()->json($Process, 201);
    }

    /**
     * @param string $ProcessId
     *
     * @return JsonResponse
     */
    public function show(string $ProcessId): JsonResponse
    {
        $Process = $this->model->find($ProcessId);
        return response()->json($Process, 200);
    }

    /**
     * @param Request $request
     * @param string  $ProcessId
     *
     * @return JsonResponse
     */
    public function update(Request $request, string $ProcessId): JsonResponse
    {
        Cache::forget(self::API);

        /** @var Process $Process */
        $Process = $this->model->find($ProcessId);
        $Process->update($request->all());
        return response()->json($Process, 200);
    }

    /**
     * @param string $ProcessId
     *
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(string $ProcessId): JsonResponse
    {
        Cache::forget(self::API);
        /** @var Process $Process */
        $Process = $this->model->find($ProcessId);
        $Process->delete();
        return response()->json(null, 204);
    }
}
