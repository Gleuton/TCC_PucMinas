<?php

namespace App\Http\Controllers;

use App\Models\ScheduleStatus;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;

class StatusController extends Controller
{
    /**
     * ProcessController constructor.
     *
     * @param ScheduleStatus|Builder $model
     */
    public function __construct(ScheduleStatus $model)
    {
        $this->model = $model;
        $this->api = 'api::scheduleStatus';
    }
}
