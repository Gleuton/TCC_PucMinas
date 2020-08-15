<?php

use App\Models\Schedule;
use App\Models\ScheduleType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;

class ScheduleTypeTest extends TestCase
{
    use DatabaseMigrations;

    public function testInsertSchedulingType(): void
    {
        $data = factory(ScheduleType::class)->create();
        self::assertInstanceOf(Model::class, $data);
    }

    public function testSelectSchedulingType(): void
    {
        $data = factory(ScheduleType::class, 6)->create();
        self::assertInstanceOf(Collection::class, $data);
        self::assertCount(6, $data);
    }

    public function testSelectOneSchedulingType(): void
    {
        $data = factory(ScheduleType::class)->create();
        $type = ScheduleType::find($data->id);
        self::assertInstanceOf(Model::class, $type);
    }

    public function testDeleteSchedulingType(): void
    {
        $data = factory(ScheduleType::class)->create();
        $type = ScheduleType::find($data->id);
        self::assertInstanceOf(Model::class, $type);
        self::assertTrue($type->delete());
    }

    public function testUpdateSchedulingType(): void
    {
        $update = ['type' => 'inativo'];
        $data = factory(ScheduleType::class)->create();
        $SchedulingType = ScheduleType::find($data->id);
        self::assertInstanceOf(Model::class, $SchedulingType);
        self::assertTrue($SchedulingType->update($update));
        $SchedulingType = ScheduleType::find($data->id)->toArray();
        self::assertEquals($SchedulingType['type'], $update['type']);
    }

    public function testSelectNcBySchedulingType(): void
    {
        $data = factory(ScheduleType::class)->create();
        factory(Schedule::class)->create(['schedule_type_id' => $data->id]);
        self::assertInstanceOf(Collection::class, $data->schedules);
    }
}
