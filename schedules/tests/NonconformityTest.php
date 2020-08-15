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
        self::assertInstanceOf(Model::class, $data);
    }

    public function testSelectNc(): void
    {
        $data = factory(Nonconformity::class, 6)->create();
        self::assertInstanceOf(Collection::class, $data);
        self::assertCount(6, $data);
    }

    public function testSelectOneNc(): void
    {
        $data = factory(Nonconformity::class)->create();
        $nc = Nonconformity::find($data->id);
        self::assertInstanceOf(Model::class, $nc);
    }

    public function testDeleteNc(): void
    {
        $data = factory(Nonconformity::class)->create();
        $nc = Nonconformity::find($data->id);
        self::assertInstanceOf(Model::class, $nc);
        self::assertTrue($nc->delete());
    }

    public function testUpdateNc(): void
    {
        $update = ['standard' => 'regra'];
        $data = factory(Nonconformity::class)->create();
        $nc = Nonconformity::find($data->id);
        self::assertInstanceOf(Model::class, $nc);
        self::assertTrue($nc->update($update));
        $nc = Nonconformity::find($data->id)->toArray();
        self::assertEquals($nc['standard'], $update['standard']);
    }

    public function testSelectNcStatusByNc(): void
    {
        $nc = factory(Nonconformity::class)->create();
        self::assertInstanceOf(NcStatus::class, $nc->status);
    }

    public function testSelectNcTypeByNc(): void
    {
        $nc = factory(Nonconformity::class)->create();
        self::assertInstanceOf(NcType::class, $nc->type);
    }

    public function testSelectSchedulesTypeByNc(): void
    {
        $nc = factory(Nonconformity::class)->create();
        factory(Schedule::class, 3)->create(['nonconformity_id' => $nc]);
        self::assertInstanceOf(Collection::class, $nc->schedules);
    }
}
