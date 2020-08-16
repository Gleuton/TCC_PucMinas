<?php

use App\Models\Sector;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;

class SectorTest extends TestCase
{
    use DatabaseMigrations;

    public function testInsertSector(): void
    {
        $data = factory(Sector::class)->create();
        self::assertInstanceOf(Model::class, $data);
    }

    public function testSelectSector(): void
    {
        $data = factory(Sector::class, 6)->create();
        self::assertInstanceOf(Collection::class, $data);
        self::assertCount(6, $data);
    }

    public function testSelectOneSector(): void
    {
        $data = factory(Sector::class)->create();
        $type = Sector::find($data->id);
        self::assertInstanceOf(Model::class, $type);
    }

    public function testDeleteSector(): void
    {
        $data = factory(Sector::class)->create();
        $type = Sector::find($data->id);
        self::assertInstanceOf(Model::class, $type);
        self::assertTrue($type->delete());
    }

    public function testUpdateSector(): void
    {
        $update = ['description' => 'inativo'];
        $data = factory(Sector::class)->create();
        $sector = Sector::find($data->id);
        self::assertInstanceOf(Model::class, $sector);
        self::assertTrue($sector->update($update));
        $sector = Sector::find($data->id)->toArray();
        self::assertEquals($sector['description'], $update['description']);
    }

    public function testSelectInterruptionByType(): void
    {
        $data = factory(Sector::class)->create();
        self::assertInstanceOf(Collection::class, $data->processes);
    }
}
