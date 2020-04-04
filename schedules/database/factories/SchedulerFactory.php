<?php
/** @var Factory $factory */

use App\Models\Scheduler;
use App\Models\UserType;
use Faker\Generator as Faker;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Hash;


$factory->define(
    Scheduler::class,
    static function (Faker $faker) {
        $userType = factory(UserType::class)->create();
        return [
            'id'           => Uuid::uuid(),
            'name'         => $faker->name,
            'login'        => $faker->email,
            'password'     => Hash::make('senha'),
            'user_type_id' => $userType->id
        ];
    }
);
