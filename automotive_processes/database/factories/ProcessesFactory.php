<?php
/** @var Factory $factory */

use App\Models\Interruption;
use App\Models\Process;
use Faker\Generator as Faker;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(
    Process::class,
    static function (Faker $faker) {
        $interruption = \factory(Interruption::class)->create();
        return [
            'id'              => Uuid::uuid(),
            'name'            => $faker->company . Str::random(12),
            'description'     => $faker->text,
            'interruption_id' => $interruption->id
        ];
    }
);
