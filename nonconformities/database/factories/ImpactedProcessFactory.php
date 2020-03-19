<?php
/** @var Factory $factory */


use App\Models\{ImpactedProcess,
    NcStatus,
    NcType,
    Nonconformity,
    Process,
    User
};

use Faker\Generator as Faker;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factory;


$factory->define(
    ImpactedProcess::class,
    static function (Faker $faker) {
        $nonconformity = \factory(Nonconformity::class)->create();
        $process = \factory(Process::class)->create();
        return [
            'id'               => Uuid::uuid(),
            'nonconformity_id' => $nonconformity->id,
            'process_id'       => $process->id,
        ];
    }
);
