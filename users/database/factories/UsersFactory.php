<?php
/** @var Factory $factory */

use App\Models\User;
use App\Models\UserType;
use Faker\Generator as Faker;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Hash;


$factory->define(
    User::class,
    static function (Faker $faker) {
        $userType = UserType::first() ?? factory(UserType::class)->create();
        return [
            'id'           => Uuid::uuid(),
            'name'         => $faker->name,
            'login'        => $faker->email,
            'password'     => 'senha',
            'user_type_id' => $userType->id
        ];
    }
);
