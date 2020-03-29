<?php

use App\Models\InterruptionType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;

class InterruptionTypeTest extends TestCase
{
    use DatabaseMigrations;

    public function testInsertInterruptionType(): void
    {
        $data = factory(InterruptionType::class)->create();
        $this->assertInstanceOf(Model::class, $data);
    }

    public function testSelectInterruptionType(): void
    {
        $data = factory(InterruptionType::class, 6)->create();
        $this->assertInstanceOf(Collection::class, $data);
        $this->assertCount(6, $data);
    }

    public function testSelectOneInterruptionType(): void
    {
        $data = factory(InterruptionType::class)->create();
        $type = InterruptionType::find($data->id);
        $this->assertInstanceOf(Model::class, $type);
    }

    public function testDeleteInterruptionType(): void
    {
        $data = factory(InterruptionType::class)->create();
        $type = InterruptionType::find($data->id);
        $this->assertInstanceOf(Model::class, $type);
        $this->assertTrue($type->delete());
    }

    public function testUpdateInterruptionType(): void
    {
        $update = ['type' => 'inativo'];
        $data = factory(InterruptionType::class)->create();
        $interruptionType = InterruptionType::find($data->id);
        $this->assertInstanceOf(Model::class, $interruptionType);
        $this->assertTrue($interruptionType->update($update));
        $interruptionType = InterruptionType::find($data->id)->toArray();
        $this->assertEquals($interruptionType['type'], $update['type']);
    }

    public function testSeletInterruptionByType(): void
    {
        $data = factory(InterruptionType::class)->create();
        $this->assertInstanceOf(Collection::class, $data->interruptions);
    }
}
