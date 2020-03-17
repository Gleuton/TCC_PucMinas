<?php
/** @var Factory $factory */

use App\Models\NcType;
use Faker\Generator as Faker;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factory;


$factory->define(
    NcType::class, static function (Faker $faker) {
    return [
        'id' => Uuid::uuid(),
        'type' => $faker->city
    ];
});
