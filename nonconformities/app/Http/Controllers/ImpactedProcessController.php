<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\ImpactedProcess;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

}
