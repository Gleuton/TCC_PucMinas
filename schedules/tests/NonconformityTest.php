<?php

use App\Models\NcStatus;
use App\Models\NcType;
use App\Models\Nonconformity;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;

class NonconformityTest extends TestCase
{
    use DatabaseMigrations;

    public function testInsertNc(): void
    {
        $data = factory(Nonconformity::class)->create();
        $this->assertInstanceOf(Model::class, $data);
    }

    public function testSelectNc(): void
    {
        $data = factory(Nonconformity::class, 6)->create();
        $this->assertInstanceOf(Collection::class, $data);
        $this->assertCount(6, $data);
    }

    public function testSelectOneNc(): void
    {
        $data = factory(Nonconformity::class)->create();
        $nc = Nonconformity::find($data->id);
        $this->assertInstanceOf(Model::class, $nc);
    }

    public function testDeleteNc(): void
    {
        $data = factory(Nonconformity::class)->create();
        $nc = Nonconformity::find($data->id);
        $this->assertInstanceOf(Model::class, $nc);
        $this->assertTrue($nc->delete());
    }

    public function testUpdateNc(): void
    {
        $update = ['standard' => 'regra'];
        $data = factory(Nonconformity::class)->create();
        $nc = Nonconformity::find($data->id);
        $this->assertInstanceOf(Model::class, $nc);
        $this->assertTrue($nc->update($update));
        $nc = Nonconformity::find($data->id)->toArray();
        $this->assertEquals($nc['standard'], $update['standard']);
    }

    public function testSeletNcStatusByNc(): void
    {
        $nc = factory(Nonconformity::class)->create();
        $this->assertInstanceOf(NcStatus::class, $nc->status);
    }

    public function testSeletNcTypeByNc(): void
    {
        $nc = factory(Nonconformity::class)->create();
        $this->assertInstanceOf(NcType::class, $nc->type);
    }

    public function testSeletSchudelesTypeByNc(): void
    {
        $nc = factory(Nonconformity::class)->create();
        factory(Schedule::class, 3)->create(['nonconformity_id' => $nc]);
        $this->assertInstanceOf(Collection::class, $nc->schedules);
    }
}
