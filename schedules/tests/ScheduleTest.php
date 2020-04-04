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
        $this->assertInstanceOf(Model::class, $data);
    }

    public function testSelectScheduling(): void
    {
        $data = factory(Schedule::class, 6)->create();
        $this->assertInstanceOf(Collection::class, $data);
        $this->assertCount(6, $data);
    }

    public function testSelectOneScheduling(): void
    {
        $data = factory(Schedule::class)->create();
        $scheduling = Schedule::find($data->id);
        $this->assertInstanceOf(Model::class, $scheduling);
    }

    public function testDeleteScheduling(): void
    {
        $data = factory(Schedule::class)->create();
        $scheduling = Schedule::find($data->id);
        $this->assertInstanceOf(Model::class, $scheduling);
        $this->assertTrue($scheduling->delete());
    }

    public function testUpdateScheduling(): void
    {
        $update = ['description' => 'descrição'];
        $data = factory(Schedule::class)->create();
        $scheduling = Schedule::find($data->id);
        $this->assertInstanceOf(Model::class, $scheduling);
        $this->assertTrue($scheduling->update($update));
        $scheduling = Schedule::find($data->id)->toArray();
        $this->assertEquals($scheduling['description'], $update['description']);
    }

    public function testSeletTypeScheduleBySchedule(): void
    {
        $data = factory(Schedule::class)->create();
        $this->assertInstanceOf(ScheduleType::class, $data->scheduleType);
    }

    public function testSeletStatusScheduleBySchedule(): void
    {
        $data = factory(Schedule::class)->create();
        $this->assertInstanceOf(ScheduleStatus::class, $data->scheduleStatus);
    }

    public function testSeletNcBySchedule(): void
    {
        $data = factory(Schedule::class)->create();
        $this->assertInstanceOf(Nonconformity::class, $data->nonconformity);
    }

    public function testSeletPerformerBySchedule(): void
    {
        $performer = factory(Performer::class)->create();
        $data = factory(Schedule::class)->create(
            ['performer_id' => $performer]
        );
        $this->assertInstanceOf(Performer::class, $data->performer);
    }

    public function testSeletPerformerByScheduleWithoutPerformer(): void
    {
        $data = factory(Schedule::class)->create();
        $this->assertNull($data->performer);
    }
    public function testSeletSchedulerBySchedule(): void
    {
        $data = factory(Schedule::class)->create();
        $this->assertInstanceOf(Scheduler::class, $data->scheduler);
    }
}
