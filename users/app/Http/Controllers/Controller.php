<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Laravel\Lumen\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    /**
     * @var Model|Builder
     */
    protected Model $model;
    protected string $api;
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $minutes = Carbon::now()->addMinutes(10);

        $data = Cache::remember(
            $this->api,
            $minutes,
            function () {
                return $this->model::all();
            }
        );
        return response()->json($data, 200);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    abstract public function store(Request $request): JsonResponse;

    /**
     * @param string $id
     *
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $userType = $this->model->find($id);
        return response()->json($userType, 200);
    }

    /**
     * @param Request $request
     * @param string  $id
     *
     * @return JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse
    {
        Cache::forget($this->api);

        /** @var Model $data */
        $data = $this->model->find($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }

    /**
     * @param string $id
     *
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(string $id): JsonResponse
    {
        Cache::forget($this->api);
        /** @var Model $data */
        $data = $this->model->find($id);
        $data->delete();
        return response()->json(null, 204);
    }
}
