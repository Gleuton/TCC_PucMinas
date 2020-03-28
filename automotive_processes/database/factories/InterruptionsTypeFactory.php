<?php
/** @var Factory $factory */

use App\Models\InterruptionType;
use Faker\Generator as Faker;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(
    InterruptionType::class, static function (Faker $faker) {
    return [
        'id' => Uuid::uuid(),
        'description' => $faker->text
    ];
});
