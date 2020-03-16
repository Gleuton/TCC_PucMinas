<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\NcStatus;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class NcStatusController extends Controller
{
    private const API = 'api::ncStatus';
    private NcStatus $model;

    /**
     * NcStatusController constructor.
     *
     * @param NcStatus|Builder $model
     */
    public function __construct(NcStatus $model)
    {
        $this->model = $model;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $minutes = Carbon::now()->addMinutes(10);

        $ncStatus = Cache::remember(
            self::API,
            $minutes,
            function () {
                return $this->model::all();
            }
        );
        return response()->json($ncStatus, 200);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        Cache::forget(self::API);
        $ncStatus = new NcStatus($request->all());
        $ncStatus->save();
        return response()->json($ncStatus, 201);
    }

    /**
     * @param string $ncStatusId
     *
     * @return JsonResponse
     */
    public function show(string $ncStatusId): JsonResponse
    {
        $ncStatus = $this->model->find($ncStatusId);
        return response()->json($ncStatus, 200);
    }

    /**
     * @param Request $request
     * @param string  $ncStatusId
     *
     * @return JsonResponse
     */
    public function update(Request $request, string $ncStatusId): JsonResponse
    {
        Cache::forget(self::API);

        /** @var NcStatus $ncStatus */
        $ncStatus = $this->model->find($ncStatusId);
        $ncStatus->update($request->all());
        return response()->json($ncStatus, 200);
    }

    /**
     * @param string $ncStatusId
     *
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(string $ncStatusId): JsonResponse
    {
        Cache::forget(self::API);
        /** @var NcStatus $ncStatus */
        $ncStatus = $this->model->find($ncStatusId);
        $ncStatus->delete();
        return response()->json(null, 204);
    }
}
