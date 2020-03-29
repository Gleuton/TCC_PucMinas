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
        $this->assertInstanceOf(Model::class, $data);
    }

    public function testSelectSector(): void
    {
        $data = factory(Sector::class, 6)->create();
        $this->assertInstanceOf(Collection::class, $data);
        $this->assertCount(6, $data);
    }

    public function testSelectOneSector(): void
    {
        $data = factory(Sector::class)->create();
        $type = Sector::find($data->id);
        $this->assertInstanceOf(Model::class, $type);
    }

    public function testDeleteSector(): void
    {
        $data = factory(Sector::class)->create();
        $type = Sector::find($data->id);
        $this->assertInstanceOf(Model::class, $type);
        $this->assertTrue($type->delete());
    }

    public function testUpdateSector(): void
    {
        $update = ['description' => 'inativo'];
        $data = factory(Sector::class)->create();
        $sector = Sector::find($data->id);
        $this->assertInstanceOf(Model::class, $sector);
        $this->assertTrue($sector->update($update));
        $sector = Sector::find($data->id)->toArray();
        $this->assertEquals($sector['description'], $update['description']);
    }

    public function testSeletInterruptionByType(): void
    {
        $data = factory(Sector::class)->create();
        $this->assertInstanceOf(Collection::class, $data->processes);
    }
}
