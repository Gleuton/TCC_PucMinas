<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Nonconformity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
        $this->validate(
            $request,
            [
                'description' => 'required',
                'solution'    => 'required',
                'standard'    => 'required',
                'user_id'     => 'required',
                'type_id'     => 'required',
                'status_id'   => 'required',
                'process_id'  => 'required',
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
                'description' => 'sometimes|required',
                'solution'    => 'sometimes|required',
                'standard'    => 'sometimes|required',
                'user_id'     => 'sometimes|required',
                'type_id'     => 'sometimes|required',
                'status_id'   => 'sometimes|required',
                'process_id'  => 'sometimes|required',
            ]
        );
        return parent::update($request, $id);
    }
}
