<?php

use App\Models\{ImpactedProcess, Nonconformity, Process};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;

class ImpactedProcessTest extends TestCase
{
    use DatabaseMigrations;

    public function testInsertImpactedProcess(): void
    {
        $data = factory(ImpactedProcess::class)->create();
        self::assertInstanceOf(Model::class, $data);
    }

    public function testSelectImpactedProcess(): void
    {
        $data = factory(ImpactedProcess::class, 6)->create();
        self::assertInstanceOf(Collection::class, $data);
        self::assertCount(6, $data);
    }

    public function testSelectOneImpactedProcess(): void
    {
        $data = factory(ImpactedProcess::class)->create();
        $ip = ImpactedProcess::find($data->id);
        self::assertInstanceOf(Model::class, $ip);
    }

    public function testDeleteImpactedProcess(): void
    {
        $data = factory(ImpactedProcess::class)->create();
        $ip = ImpactedProcess::find($data->id);
        self::assertInstanceOf(Model::class, $ip);
        self::assertTrue($ip->delete());
    }

    public function testSelectNcByImpactedProcess(): void
    {
        $data = factory(ImpactedProcess::class)->create();
        self::assertInstanceOf(
            Nonconformity::class,
            $data->nonconformity
        );
    }

    public function testSelectProcessByImpactedProcess(): void
    {
        $data = factory(ImpactedProcess::class)->create();
        self::assertInstanceOf(
            Process::class,
            $data->process
        );
    }
}
