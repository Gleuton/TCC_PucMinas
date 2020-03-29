<?php
/** @var Factory $factory */

use App\Models\Interruption;
use App\Models\InterruptionType;
use App\Models\Process;
use Faker\Generator as Faker;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(
    Interruption::class, static function (Faker $faker) {
        $process = \factory(Process::class)->create();
    return [
        'id' => Uuid::uuid(),
        'work_shift' => $faker->numberBetween(1,4) . Str::random(12),
        'description' => $faker->text,
        'process_id' => $process->id,
    ];
});
