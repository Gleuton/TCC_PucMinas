<?php


use App\Models\ScheduleStatus;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;

class SchedulingStatusTest extends TestCase
{
    use DatabaseMigrations;

    public function testInsertSchedulingStatus(): void
    {
        $data = factory(ScheduleStatus::class)->create();
        $this->assertInstanceOf(Model::class, $data);
    }

    public function testSelectSchedulingStatus(): void
    {
        $data = factory(ScheduleStatus::class, 6)->create();
        $this->assertInstanceOf(Collection::class, $data);
        $this->assertCount(6, $data);
    }

    public function testSelectOneSchedulingStatus(): void
    {
        $data = factory(ScheduleStatus::class)->create();
        $schedulingStatus = ScheduleStatus::find($data->id);
        $this->assertInstanceOf(Model::class, $schedulingStatus);
    }

    public function testDeleteSchedulingStatus(): void
    {
        $data = factory(ScheduleStatus::class)->create();
        $schedulingStatus = ScheduleStatus::find($data->id);
        $this->assertInstanceOf(Model::class, $schedulingStatus);
        $this->assertTrue($schedulingStatus->delete());
    }

    public function testUpdateSchedulingStatus(): void
    {
        $update = ['status' => 'inativo'];
        $data = factory(ScheduleStatus::class)->create();
        $schedulingStatus = ScheduleStatus::find($data->id);
        $this->assertInstanceOf(Model::class, $schedulingStatus);
        $this->assertTrue($schedulingStatus->update($update));
        $schedulingStatus = ScheduleStatus::find($data->id)->toArray();
        $this->assertEquals($schedulingStatus['status'], $update['status']);
    }

//    public function testSeletSchedulesBySchedulingStatus(): void
//    {
//        $data = factory(SchedulingStatus::class)->create();
//        $this->assertInstanceOf(Collection::class, $data->schedules);
//    }
}
