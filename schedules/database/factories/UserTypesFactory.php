<?php
/** @var Factory $factory */

use App\Models\UserType;
use Faker\Generator as Faker;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factory;


$factory->define(
    UserType::class, static function (Faker $faker) {
    return [
        'id' => Uuid::uuid(),
        'type' => $faker->city
    ];
});
