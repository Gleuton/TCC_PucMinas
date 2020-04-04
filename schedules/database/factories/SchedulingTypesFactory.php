<?php
/** @var Factory $factory */

use App\Models\ScheduleType;
use Faker\Generator as Faker;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factory;


$factory->define(
    ScheduleType::class,
    static function (Faker $faker) {
        return [
            'id'          => Uuid::uuid(),
            'type'        => $faker->city,
            'description' => $faker->text()
        ];
    }
);
