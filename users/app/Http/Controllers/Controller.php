<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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
    public function store(Request $request): JsonResponse
    {
        try {
            $this->authorize('create', Auth::user());
            Cache::forget($this->api);
            $data = $request->all();
            /**
             * @var Model $model
             */
            $model = new $this->model($data);
            $model->save();
            return response()->json($model, 201);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    /**
     * @param string $id
     *
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        try {
            $this->authorize('view', Auth::user());
            $userType = $this->model->find($id);
            return response()->json($userType, 200);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    /**
     * @param Request $request
     * @param string  $id
     *
     * @return JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse
    {
        try {
            $this->authorize('update', Auth::user());
            Cache::forget($this->api);

            /** @var Model $data */
            $data = $this->model->find($id);
            $data->update($request->all());
            return response()->json($data, 200);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    /**
     * @param string $id
     *
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $this->authorize('delete', Auth::user());
            Cache::forget($this->api);
            /** @var Model $data */
            $data = $this->model->find($id);
            $data->delete();
            return response()->json(null, 204);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }
}
