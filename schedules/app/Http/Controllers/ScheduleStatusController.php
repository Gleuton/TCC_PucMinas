<?php

namespace App\Http\Controllers;

use App\Models\ScheduleStatus;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ScheduleStatusController extends Controller
{
    /**
     * ProcessController constructor.
     *
     * @param ScheduleStatus|Builder $model
     */
    public function __construct(ScheduleStatus $model)
    {
        $this->model = $model;
        $this->api = 'api::schedule_status';
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
                'status'           => 'required|string|max:255',
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
                'status'           => 'sometimes|required|string|max:255',
            ]
        );
        return parent::update($request, $id);
    }
}
