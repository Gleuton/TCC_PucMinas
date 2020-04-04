<?php
/** @var Factory $factory */

use App\Models\{Nonconformity,
    Scheduler,
    Schedule,
    ScheduleStatus,
    ScheduleType};

use Faker\Generator as Faker;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factory;


$factory->define(
    Schedule::class,
    static function (Faker $faker) {
        $nc = \factory(Nonconformity::class)->create();
        $scheduler = \factory(Scheduler::class)->create();
        $type = \factory(ScheduleType::class)->create();
        $status = \factory(ScheduleStatus::class)->create();

        return [
            'id'                   => Uuid::uuid(),
            'scheduling'           => $faker->city,
            'description'          => $faker->text(),
            'scheduling_date'          => $faker->dateTime(),
            'nonconformity_id'     => $nc->id,
            'schedule_type_id'   => $type->id,
            'schedule_status_id' => $status->id,
            'scheduler_id'         => $scheduler->id
        ];
    }
);
