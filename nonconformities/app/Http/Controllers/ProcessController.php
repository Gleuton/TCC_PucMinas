<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\ImpactedProcess;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProcessController extends Controller
{
    /**
     * ImpactedProcessController constructor.
     *
     * @param ImpactedProcess|Builder $model
     */
    public function __construct(ImpactedProcess $model)
    {
        $this->model = $model;
        $this->api = 'api::process';
    }
}
