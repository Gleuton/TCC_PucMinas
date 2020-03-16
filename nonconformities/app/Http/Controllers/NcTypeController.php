<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\NcType;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class NcTypeController extends Controller
{
    private const API = 'api::ncType';
    private NcType $model;

    /**
     * NcTypeController constructor.
     *
     * @param NcType|Builder $model
     */
    public function __construct(NcType $model)
    {
        $this->model = $model;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $minutes = Carbon::now()->addMinutes(10);
        $ncTypes = Cache::remember(
            self::API,
            $minutes,
            static function () {
                return $this->model::all();
            }
        );

        return response()->json($ncTypes, 200);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        Cache::forget(self::API);
        $ncType = new NcType($request->all());
        $ncType->save();
        return response()->json($ncType, 201);
    }

    /**
     * @param string $ncTypeId
     *
     * @return JsonResponse
     */
    public function show(string $ncTypeId): JsonResponse
    {
        $ncType = $this->model->find($ncTypeId);
        return response()->json($ncType, 200);
    }

    /**
     * @param Request $request
     * @param string  $ncTypeId
     *
     * @return JsonResponse
     */
    public function update(Request $request, string $ncTypeId): JsonResponse
    {
        Cache::forget(self::API);

        /** @var NcType $ncType */
        $ncType = $this->model->find($ncTypeId);
        $ncType->update($request->all());
        return response()->json($ncType, 200);
    }

    /**
     * @param string $ncTypeId
     *
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(string $ncTypeId): JsonResponse
    {
        Cache::forget(self::API);
        /** @var NcType $ncType */
        $ncType = $this->model->find($ncTypeId);
        $ncType->delete();
        return response()->json(null, 204);
    }
}
