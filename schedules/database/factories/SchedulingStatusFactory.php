<?php
/** @var Factory $factory */

use App\Models\ScheduleStatus;
use Faker\Generator as Faker;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factory;


$factory->define(
    ScheduleStatus::class, static function (Faker $faker) {
    return [
        'id' => Uuid::uuid(),
        'status' => $faker->state
    ];
});
