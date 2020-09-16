<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\NcStatus;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NcStatusController extends Controller
{
    /**
     * NcStatusController constructor.
     *
     * @param NcStatus|Builder $model
     */
    public function __construct(NcStatus $model)
    {
        $this->model = $model;
        $this->api = 'api::ncStatus';
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
                'status' => 'required'
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
                'status' => 'sometimes|required'
            ]
        );
        return parent::update($request, $id);
    }
}
