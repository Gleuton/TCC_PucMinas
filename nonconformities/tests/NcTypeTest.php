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
        self::assertInstanceOf(Model::class, $data);
    }

    public function testSelectNcType(): void
    {
        $data = factory(NcType::class, 6)->create();
        self::assertInstanceOf(Collection::class, $data);
        self::assertCount(6, $data);
    }

    public function testSelectOneNcType(): void
    {
        $data = factory(NcType::class)->create();
        $type = NcType::find($data->id);
        self::assertInstanceOf(Model::class, $type);
    }

    public function testDeleteNcType(): void
    {
        $data = factory(NcType::class)->create();
        $type = NcType::find($data->id);
        self::assertInstanceOf(Model::class, $type);
        self::assertTrue($type->delete());
    }

    public function testUpdateNcType(): void
    {
        $update = ['type' => 'inativo'];
        $data = factory(NcType::class)->create();
        $ncType = NcType::find($data->id);
        self::assertInstanceOf(Model::class, $ncType);
        self::assertTrue($ncType->update($update));
        $ncType = NcType::find($data->id)->toArray();
        self::assertEquals($ncType['type'], $update['type']);
    }

    public function testSeletNcByNcType(): void
    {
        $data = factory(NcType::class)->create();
        self::assertInstanceOf(
            Collection::class,
            $data->nonconformities
        );
    }
}
