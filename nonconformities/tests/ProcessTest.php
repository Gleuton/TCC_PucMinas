<?php

use App\Models\Process;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;

class ProcessTest extends TestCase
{
    use DatabaseMigrations;

    public function testInsertProcess(): void
    {
        $data = factory(Process::class)->create();
        self::assertInstanceOf(Model::class, $data);
    }

    public function testSelectProcess(): void
    {
        $data = factory(Process::class, 6)->create();
        self::assertInstanceOf(Collection::class, $data);
        self::assertCount(6, $data);
    }

    public function testSelectOneProcess(): void
    {
        $data = factory(Process::class)->create();
        $process = Process::find($data->id);
        self::assertInstanceOf(Model::class, $process);
    }

    public function testDeleteProcess(): void
    {
        $data = factory(Process::class)->create();
        $process = Process::find($data->id);
        self::assertInstanceOf(Model::class, $process);
        self::assertTrue($process->delete());
    }

    public function testUpdateProcess(): void
    {
        $update = ['name' => 'criar'];
        $data = factory(Process::class)->create();
        $process = Process::find($data->id);
        self::assertInstanceOf(Model::class, $process);
        self::assertTrue($process->update($update));
        $Process = Process::find($data->id)->toArray();
        self::assertEquals($Process['name'], $update['name']);
    }

    public function testSeletNcByProcess(): void
    {
        $data = factory(Process::class)->create();
        self::assertInstanceOf(
            Collection::class,
            $data->nonconformities
        );
    }
}
