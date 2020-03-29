<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
     * @inheritDoc
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $validation = 'required';
        $this->validate(
            $request,
            [
                'name'            => $validation,
                'descripition'    => $validation,
                'sector_id'       => $validation,
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
                'name'            => $validation,
                'descripition'    => $validation,
                'sector_id'       => $validation,
            ]
        );

        return parent::update($request, $id);
    }

}
