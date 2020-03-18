<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Nonconformity;
use App\Models\Process;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

class NonconformityController extends Controller
{
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
        Cache::forget($this->api);
        $nc = new Nonconformity($request->all());
        $nc->save();
        return response()->json($nc, 201);
    }
}
