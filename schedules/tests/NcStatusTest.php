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
        $this->assertInstanceOf(Model::class, $data);
    }

    public function testSelectNcStatus(): void
    {
        $data = factory(NcStatus::class, 6)->create();
        $this->assertInstanceOf(Collection::class, $data);
        $this->assertCount(6, $data);
    }

    public function testSelectOneNcStatus(): void
    {
        $data = factory(NcStatus::class)->create();
        $ncStatus = NcStatus::find($data->id);
        $this->assertInstanceOf(Model::class, $ncStatus);
    }

    public function testDeleteNcStatus(): void
    {
        $data = factory(NcStatus::class)->create();
        $ncStatus = NcStatus::find($data->id);
        $this->assertInstanceOf(Model::class, $ncStatus);
        $this->assertTrue($ncStatus->delete());
    }

    public function testUpdateNcStatus(): void
    {
        $update = ['status' => 'inativo'];
        $data = factory(NcStatus::class)->create();
        $ncStatus = NcStatus::find($data->id);
        $this->assertInstanceOf(Model::class, $ncStatus);
        $this->assertTrue($ncStatus->update($update));
        $ncStatus = NcStatus::find($data->id)->toArray();
        $this->assertEquals($ncStatus['status'], $update['status']);
    }

    public function testSeletNcByNcStatus(): void
    {
        $data = factory(NcStatus::class)->create();
        $this->assertInstanceOf(Collection::class, $data->nonconformities);
    }
}
