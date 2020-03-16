<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Nonconformity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class NonconformityController extends Controller
{
    private const API = 'api::nonconformity';

    /**
     * @return Response
     */
    public function index(): Response
    {
        $minutes = Carbon::now()->addMinutes(10);
        return Cache::remember(
            self::API,
            $minutes,
            static function () {
                return Nonconformity::all();
            }
        );
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        Cache::forget(self::API);
        $nc = Nonconformity::create($request->all());
        return response()->json($nc, 201);
    }

    /**
     * @param Nonconformity $nc
     *
     * @return JsonResponse
     */
    public function show(Nonconformity $nc): JsonResponse
    {
        return response()->json($nc, 200);
    }

    /**
     * @param Request       $request
     * @param Nonconformity $nc
     *
     * @return JsonResponse
     */
    public function update(Request $request, Nonconformity $nc): JsonResponse
    {
        Cache::forget(self::API);
        $nc->update($request->all());
        return response()->json($nc, 200);
    }

    /**
     * @param Nonconformity $nc
     *
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Nonconformity $nc): JsonResponse
    {
        Cache::forget(self::API);
        $nc->delete();
        return response()->json(null, 204);
    }
}
