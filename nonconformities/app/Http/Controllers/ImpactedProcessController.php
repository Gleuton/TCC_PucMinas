<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\ImpactedProcess;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class ImpactedProcessController extends Controller
{
    /**
     * ImpactedProcessController constructor.
     *
     * @param ImpactedProcess|Builder $model
     */
    public function __construct(ImpactedProcess $model)
    {
        $this->model = $model;
        $this->api = 'api::impacted_process';
    }

    /**
     * @inheritDoc
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $validation = 'required';
        $this->validate(
            $request,
            [
                'nonconformity_id' => $validation,
                'process_id'       => $validation,
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
        $validation = 'sometimes|required';
        $this->validate(
            $request,
            [
                'nonconformity_id' => $validation,
                'process_id'       => $validation,
            ]
        );
        return parent::update($request, $id);
    }

    /**
     * @param string $id_nc
     *
     * @return JsonResponse
     */
    public function getNc(string $id_nc): ?JsonResponse
    {
        try {
            $this->authorize('view', $this->model);
            $minutes = Carbon::now()->addMinutes(10);

            $data = Cache::remember(
                $this->api,
                $minutes,
                function () use ($id_nc) {
                    return $this->model->find($id_nc, 'nonconformity_id');
                }
            );
            return response()->json($data, 200);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }
}
