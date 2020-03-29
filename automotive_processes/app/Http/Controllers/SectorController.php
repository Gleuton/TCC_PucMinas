<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SectorController extends Controller
{
    /**
     * SectorController constructor.
     *
     * @param Sector|Builder $model
     */
    public function __construct(Sector $model)
    {
        $this->model = $model;
        $this->api = 'api::sector';
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
                'sector'       => $validation,
                'descripition' => $validation
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
                'sector'       => $validation,
                'descripition' => $validation
            ]
        );

        return parent::update($request, $id);
    }

}
