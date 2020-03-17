<?php
/** @var Factory $factory */

use App\Models\NcStatus;
use Faker\Generator as Faker;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factory;


$factory->define(
    NcStatus::class, static function (Faker $faker) {
    return [
        'id' => Uuid::uuid(),
        'status' => $faker->state
    ];
});
