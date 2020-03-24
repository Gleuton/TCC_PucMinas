<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\NcType;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     */
    public function store(Request $request): JsonResponse
    {
        return parent::store($request);
    }
}
