<?php

use App\Models\NcStatus;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;

class NcStatusTest extends TestCase
{
    use DatabaseMigrations;

    public function testInsertNcStatus(): void
    {
        $data = factory(NcStatus::class)->create();
        self::assertInstanceOf(Model::class, $data);
    }

    public function testSelectNcStatus(): void
    {
        $data = factory(NcStatus::class, 6)->create();
        self::assertInstanceOf(Collection::class, $data);
        self::assertCount(6, $data);
    }

    public function testSelectOneNcStatus(): void
    {
        $data = factory(NcStatus::class)->create();
        $ncStatus = NcStatus::find($data->id);
        self::assertInstanceOf(Model::class, $ncStatus);
    }

    public function testDeleteNcStatus(): void
    {
        $data = factory(NcStatus::class)->create();
        $ncStatus = NcStatus::find($data->id);
        self::assertInstanceOf(Model::class, $ncStatus);
        self::assertTrue($ncStatus->delete());
    }

    public function testUpdateNcStatus(): void
    {
        $update = ['status' => 'inativo'];
        $data = factory(NcStatus::class)->create();
        $ncStatus = NcStatus::find($data->id);
        self::assertInstanceOf(Model::class, $ncStatus);
        self::assertTrue($ncStatus->update($update));
        $ncStatus = NcStatus::find($data->id)->toArray();
        self::assertEquals($ncStatus['status'], $update['status']);
    }

    public function testSelectNcByNcStatus(): void
    {
        $data = factory(NcStatus::class)->create();
        self::assertInstanceOf(
            Collection::class,
            $data->nonconformities
        );
    }
}
