<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Database\Query\Builder;


class ProcessController extends Controller
{
    /**
     * ImpactedProcessController constructor.
     *
     * @param Process|Builder $model
     */
    public function __construct(Process $model)
    {
        $this->model = $model;
        $this->api = 'api::process';
    }
}
