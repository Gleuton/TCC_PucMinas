<?php

use App\Models\Interruption;
use App\Models\InterruptionType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;

class InterruptionTest extends TestCase
{
    use DatabaseMigrations;

    public function testInsertInterruption(): void
    {
        $data = factory(Interruption::class)->create();
        $this->assertInstanceOf(Model::class, $data);
    }

    public function testSelectInterruption(): void
    {
        $data = factory(Interruption::class, 6)->create();
        $this->assertInstanceOf(Collection::class, $data);
        $this->assertCount(6, $data);
    }

    public function testSelectOneInterruption(): void
    {
        $data = factory(Interruption::class)->create();
        $interruption = Interruption::find($data->id);
        $this->assertInstanceOf(Model::class, $interruption);
    }

    public function testDeleteInterruption(): void
    {
        $data = factory(Interruption::class)->create();
        $interruption = Interruption::find($data->id);
        $this->assertInstanceOf(Model::class, $interruption);
        $this->assertTrue($interruption->delete());
    }

    public function testUpdateInterruption(): void
    {
        $update = ['description' => 'descrevendo'];
        $data = factory(Interruption::class)->create();
        $interruption = Interruption::find($data->id);
        $this->assertInstanceOf(Model::class, $interruption);
        $this->assertTrue($interruption->update($update));
        $interruption = Interruption::find($data->id)->toArray();
        $this->assertEquals($interruption['description'], $update['description']);
    }

    public function testSeletProcessesByInterruption(): void
    {
        $data = factory(Interruption::class)->create();
        $this->assertInstanceOf(Model::class, $data->process);
    }

    public function testSeletTypeByInterruption(): void
    {
        $data = factory(Interruption::class)->create();
        $this->assertInstanceOf(InterruptionType::class, $data->interruptionType);
    }
}
