<?php
/** @var Factory $factory */


use App\Models\{NcStatus, NcType, Nonconformity, Process, User};

use Faker\Generator as Faker;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factory;


$factory->define(
    Nonconformity::class, static function (Faker $faker) {
    $user = \factory(User::class)->create();
    $type = \factory(NcType::class)->create();
    $status = \factory(NcStatus::class)->create();
    $process = \factory(Process::class)->create();
    return [
        'id' => Uuid::uuid(),
        'description' => $faker->text,
        'solution' => $faker->text,
        'standard' => $faker->text,
        'user_id' => $user->id,
        'type_id' => $type->id,
        'status_id' => $status->id,
        'process_id' => $process->id,
    ];
});
