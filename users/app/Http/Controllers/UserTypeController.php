<?php

/**
 * Author: gleuton.pereira
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\UserType;
use Illuminate\Database\Query\Builder;

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
}
