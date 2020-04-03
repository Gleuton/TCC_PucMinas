<?php

use App\Models\Nonconformity;
use App\Models\Process;
use App\Models\Sector;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ProcessTest extends TestCase
{
    use DatabaseMigrations;

    public function testInsertProcess(): void
    {
        $data = factory(Process::class)->create();
        $this->assertInstanceOf(Model::class, $data);
    }

    public function testSelectProcess(): void
    {
        $data = factory(Process::class, 6)->create();
        $this->assertInstanceOf(Collection::class, $data);
        $this->assertCount(6, $data);
    }

    public function testSelectOneProcess(): void
    {
        $data = factory(Process::class)->create();
        $process = Process::find($data->id);
        $this->assertInstanceOf(Model::class, $process);
    }

    public function testDeleteProcess(): void
    {
        $data = factory(Process::class)->create();
        $process = Process::find($data->id);
        $this->assertInstanceOf(Model::class, $process);
        $this->assertTrue($process->delete());
    }

    public function testUpdateProcess(): void
    {
        $update = ['name' => 'criar'];
        $data = factory(Process::class)->create();
        $process = Process::find($data->id);
        $this->assertInstanceOf(Model::class, $process);
        $this->assertTrue($process->update($update));
        $Process = Process::find($data->id)->toArray();
        $this->assertEquals($Process['name'], $update['name']);
    }

    public function testSeletNcByProcess(): void
    {
        $data = factory(Process::class)->create();
        $this->assertInstanceOf(Collection::class, $data->nonconformities);
    }

    public function testSeletsectorByProcess(): void
    {
        $data = factory(Process::class)->create();
        $this->assertInstanceOf(Sector::class, $data->sector);
    }
}
