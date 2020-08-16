<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ScheduleController extends Controller
{
    /**
     * ProcessController constructor.
     *
     * @param Schedule|Builder $model
     */
    public function __construct(Schedule $model)
    {
        $this->model = $model;
        $this->api = 'api::schedule';
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $validate_id = 'required|string|max:36|min:36';
        $this->validate(
            $request,
            [
                'schedule'           => 'required|string|max:255',
                'description'        => 'required|string',
                'schedule_date'      => 'required|date',
                'nonconformity_id'   => $validate_id,
                'schedule_type_id'   => $validate_id,
                'schedule_status_id' => $validate_id,
                'scheduler_id'       => $validate_id,
                'performer_id'       => $validate_id
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
        $validate_id = 'sometimes|required|string|max:36|min:36';
        $this->validate(
            $request,
            [
                'schedule'           => $validation . '|max:255',
                'description'        => $validation,
                'schedule_date'      => $validation . '|date',
                'nonconformity_id'   => $validate_id,
                'schedule_type_id'   => $validate_id,
                'schedule_status_id' => $validate_id,
                'scheduler_id'       => $validate_id,
                'performer_id'       => $validate_id
            ]
        );
        return parent::update($request, $id);
    }
}
