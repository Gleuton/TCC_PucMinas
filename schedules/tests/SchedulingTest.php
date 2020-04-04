<?php


use App\Models\Schedule;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;

class SchedulingTest extends TestCase
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

//    public function testSeletSchedulesByScheduling(): void
//    {
//        $data = factory(Scheduling::class)->create();
//        $this->assertInstanceOf(Collection::class, $data->schedules);
//    }
}
