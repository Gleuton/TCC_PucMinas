<?php
/** @var Factory $factory */

use App\Models\Sector;
use Faker\Generator as Faker;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factory;

$factory->define(
    Sector::class, static function (Faker $faker) {
    return [
        'id' => Uuid::uuid(),
        'sector' => $faker->city,
        'description' => $faker->text,
    ];
});
