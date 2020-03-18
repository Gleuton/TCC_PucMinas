<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Nonconformity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NonconformityController extends Controller
{
    public function __construct(Nonconformity $model)
    {
        $this->model = $model;
        $this->api = 'api::nonconformity';
    }

    /**
     * @inheritDoc
     */
    public function store(Request $request): JsonResponse
    {
        // TODO: Implement store() method.
    }
}
