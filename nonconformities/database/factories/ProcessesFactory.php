<?php
/** @var Factory $factory */

use App\Models\Process;
use Faker\Generator as Faker;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factory;

$factory->define(
    Process::class, static function (Faker $faker) {
    return [
        'id' => Uuid::uuid(),
        'name' => $faker->company
    ];
});
