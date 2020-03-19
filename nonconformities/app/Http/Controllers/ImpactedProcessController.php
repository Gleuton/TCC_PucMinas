<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\ImpactedProcess;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

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
        $this->validate(
            $request,
            [
                'nonconformity_id' => 'required',
                'process_id' => 'required',
            ]
        );
        Cache::forget($this->api);
        $impactedProcess = new ImpactedProcess($request->all());
        $impactedProcess->save();
        return response()->json($impactedProcess, 201);
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
        $this->validate(
            $request,
            [
                'nonconformity_id' => 'sometimes|required',
                'process_id' => 'sometimes|required',
            ]
        );
        Cache::forget($this->api);

        /** @var Model $data */
        $data = $this->model->find($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }

}
