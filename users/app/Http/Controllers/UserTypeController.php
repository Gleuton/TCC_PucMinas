<?php


declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\UserType;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserTypeController extends Controller
{
    /**
     * UserTypeController constructor.
     *
     * @param UserType|Builder $model
     */
    public function __construct(UserType $model)
    {
        $this->model = $model;
        $this->api = 'api::userType';
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
                'type'     => 'required|string'
            ]
        );
        return parent::store($request);
    }
}
