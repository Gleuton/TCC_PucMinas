<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Interruption;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class InterruptionController extends Controller
{
    /**
     * ProcessController constructor.
     *
     * @param Interruption|Builder $model
     */
    public function __construct(Interruption $model)
    {
        $this->model = $model;
        $this->api = 'api::interruption';
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
                'work_shift'           => $validation . '|integer',
                'descripition'         => $validation,
                'interruption_type_id' => $validation,
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
                'interruption_id' => $validation,
                'sector_id'       => $validation,
            ]
        );

        return parent::update($request, $id);
    }

}
