<?php


use App\Models\Schedule;
use App\Models\ScheduleStatus;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;

class ScheduleStatusTest extends TestCase
{
    use DatabaseMigrations;

    public function testInsertSchedulingStatus(): void
    {
        $data = factory(ScheduleStatus::class)->create();
        self::assertInstanceOf(Model::class, $data);
    }

    public function testSelectSchedulingStatus(): void
    {
        $data = factory(ScheduleStatus::class, 6)->create();
        self::assertInstanceOf(Collection::class, $data);
        self::assertCount(6, $data);
    }

    public function testSelectOneSchedulingStatus(): void
    {
        $data = factory(ScheduleStatus::class)->create();
        $schedulingStatus = ScheduleStatus::find($data->id);
        self::assertInstanceOf(Model::class, $schedulingStatus);
    }

    public function testDeleteSchedulingStatus(): void
    {
        $data = factory(ScheduleStatus::class)->create();
        $schedulingStatus = ScheduleStatus::find($data->id);
        self::assertInstanceOf(Model::class, $schedulingStatus);
        self::assertTrue($schedulingStatus->delete());
    }

    public function testUpdateSchedulingStatus(): void
    {
        $update = ['status' => 'inativo'];
        $data = factory(ScheduleStatus::class)->create();
        $schedulingStatus = ScheduleStatus::find($data->id);
        self::assertInstanceOf(Model::class, $schedulingStatus);
        self::assertTrue($schedulingStatus->update($update));
        $schedulingStatus = ScheduleStatus::find($data->id)->toArray();
        self::assertEquals($schedulingStatus['status'], $update['status']);
    }

    public function testSeletSchedulesBySchedulingStatus(): void
    {
        $data = factory(ScheduleStatus::class)->create();
        factory(Schedule::class)->create(['schedule_status_id' => $data->id]);
        self::assertInstanceOf(Collection::class, $data->schedules);
    }

}
