<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NonconformityController extends Controller
{
    private const API = 'api::nonconformity';

    /**
     * @inheritDoc
     */
    public function store(Request $request): JsonResponse
    {
        // TODO: Implement store() method.
    }
}
