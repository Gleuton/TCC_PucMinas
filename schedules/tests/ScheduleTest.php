<?php


use App\Models\Nonconformity;
use App\Models\Performer;
use App\Models\Schedule;
use App\Models\Scheduler;
use App\Models\ScheduleStatus;
use App\Models\ScheduleType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;

class ScheduleTest extends TestCase
{
    use DatabaseMigrations;

    public function testInsertScheduling(): void
    {
        $data = factory(Schedule::class)->create();
        self::assertInstanceOf(Model::class, $data);
    }

    public function testSelectScheduling(): void
    {
        $data = factory(Schedule::class, 6)->create();
        self::assertInstanceOf(Collection::class, $data);
        self::assertCount(6, $data);
    }

    public function testSelectOneScheduling(): void
    {
        $data = factory(Schedule::class)->create();
        $scheduling = Schedule::find($data->id);
        self::assertInstanceOf(Model::class, $scheduling);
    }

    public function testDeleteScheduling(): void
    {
        $data = factory(Schedule::class)->create();
        $scheduling = Schedule::find($data->id);
        self::assertInstanceOf(Model::class, $scheduling);
        self::assertTrue($scheduling->delete());
    }

    public function testUpdateScheduling(): void
    {
        $update = ['description' => 'descrição'];
        $data = factory(Schedule::class)->create();
        $scheduling = Schedule::find($data->id);
        self::assertInstanceOf(Model::class, $scheduling);
        self::assertTrue($scheduling->update($update));
        $scheduling = Schedule::find($data->id)->toArray();
        self::assertEquals($scheduling['description'], $update['description']);
    }

    public function testSelectTypeScheduleBySchedule(): void
    {
        $data = factory(Schedule::class)->create();
        self::assertInstanceOf(ScheduleType::class, $data->scheduleType);
    }

    public function testSelectStatusScheduleBySchedule(): void
    {
        $data = factory(Schedule::class)->create();
        self::assertInstanceOf(ScheduleStatus::class, $data->scheduleStatus);
    }

    public function testSelectNcBySchedule(): void
    {
        $data = factory(Schedule::class)->create();
        self::assertInstanceOf(Nonconformity::class, $data->nonconformity);
    }

    public function testSelectPerformerBySchedule(): void
    {
        $performer = factory(Performer::class)->create();
        $data = factory(Schedule::class)->create(
            ['performer_id' => $performer]
        );
        self::assertInstanceOf(Performer::class, $data->performer);
    }

    public function testSelectPerformerByScheduleWithoutPerformer(): void
    {
        $data = factory(Schedule::class)->create();
        self::assertNull($data->performer);
    }
    public function testSelectSchedulerBySchedule(): void
    {
        $data = factory(Schedule::class)->create();
        self::assertInstanceOf(Scheduler::class, $data->scheduler);
    }
}
