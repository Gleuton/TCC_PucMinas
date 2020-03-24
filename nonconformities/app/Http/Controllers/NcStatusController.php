<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\NcStatus;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     */
    public function store(Request $request): JsonResponse
    {
        return parent::store($request);
    }
}
