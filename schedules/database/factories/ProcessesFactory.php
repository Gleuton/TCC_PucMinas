<?php
/** @var Factory $factory */

use App\Models\Interruption;
use App\Models\Process;
use App\Models\Sector;
use Faker\Generator as Faker;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(
    Process::class,
    static function (Faker $faker) {
        $sector = \factory(Sector::class)->create();
        return [
            'id'              => Uuid::uuid(),
            'name'            => $faker->company . Str::random(12),
            'description'     => $faker->text,
            'sector_id' => $sector->id
        ];
    }
);
