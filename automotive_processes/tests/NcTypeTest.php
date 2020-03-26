<?php

use App\Models\NcType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;

class NcTypeTest extends TestCase
{
    use DatabaseMigrations;

    public function testInsertNcType(): void
    {
        $data = factory(NcType::class)->create();
        $this->assertInstanceOf(Model::class, $data);
    }

    public function testSelectNcType(): void
    {
        $data = factory(NcType::class, 6)->create();
        $this->assertInstanceOf(Collection::class, $data);
        $this->assertCount(6, $data);
    }

    public function testSelectOneNcType(): void
    {
        $data = factory(NcType::class)->create();
        $type = NcType::find($data->id);
        $this->assertInstanceOf(Model::class, $type);
    }

    public function testDeleteNcType(): void
    {
        $data = factory(NcType::class)->create();
        $type = NcType::find($data->id);
        $this->assertInstanceOf(Model::class, $type);
        $this->assertTrue($type->delete());
    }

    public function testUpdateNcType(): void
    {
        $update = ['type' => 'inativo'];
        $data = factory(NcType::class)->create();
        $ncType = NcType::find($data->id);
        $this->assertInstanceOf(Model::class, $ncType);
        $this->assertTrue($ncType->update($update));
        $ncType = NcType::find($data->id)->toArray();
        $this->assertEquals($ncType['type'], $update['type']);
    }

    public function testSeletNcByNcType(): void
    {
        $data = factory(NcType::class)->create();
        $this->assertInstanceOf(Collection::class, $data->nonconformities);
    }
}
