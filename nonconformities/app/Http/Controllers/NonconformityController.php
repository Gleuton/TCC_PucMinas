<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Nonconformity;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NonconformityController extends Controller
{
    /**
     * NonconformityController constructor.
     *
     * @param Nonconformity|Builder $model
     */
    public function __construct(Nonconformity $model)
    {
        $this->model = $model;
        $this->api = 'api::nonconformity';
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
                'description' => $validation,
                'solution'    => $validation,
                'standard'    => $validation,
                'user_id'     => $validation,
                'type_id'     => $validation,
                'status_id'   => $validation,
                'process_id'  => $validation,
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
                'description' => $validation,
                'solution'    => $validation,
                'standard'    => $validation,
                'user_id'     => $validation,
                'type_id'     => $validation,
                'status_id'   => $validation,
                'process_id'  => $validation,
            ]
        );
        return parent::update($request, $id);
    }
}
