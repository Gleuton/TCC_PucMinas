<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\InterruptionType;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class InterruptionTypeController extends Controller
{
    /**
     * InterruptionTypeController constructor.
     *
     * @param InterruptionType|Builder $model
     */
    public function __construct(InterruptionType $model)
    {
        $this->model = $model;
        $this->api = 'api::interruption_type';
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
                'type' => 'required'
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
        $this->validate(
            $request,
            [
                'type' => 'sometimes|required'
            ]
        );

        return parent::update($request, $id);
    }

}
