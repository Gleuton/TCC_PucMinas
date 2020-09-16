<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\NcType;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NcTypeController extends Controller
{
    /**
     * NcTypeController constructor.
     *
     * @param NcType|Builder $model
     */
    public function __construct(NcType $model)
    {
        $this->model = $model;
        $this->api = 'api::ncType';
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
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
