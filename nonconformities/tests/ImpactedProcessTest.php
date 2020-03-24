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
        $this->assertInstanceOf(Model::class, $data);
    }

    public function testSelectImpactedProcess(): void
    {
        $data = factory(ImpactedProcess::class, 6)->create();
        $this->assertInstanceOf(Collection::class, $data);
        $this->assertCount(6, $data);
    }

    public function testSelectOneImpactedProcess(): void
    {
        $data = factory(ImpactedProcess::class)->create();
        $ip = ImpactedProcess::find($data->id);
        $this->assertInstanceOf(Model::class, $ip);
    }

    public function testDeleteImpactedProcess(): void
    {
        $data = factory(ImpactedProcess::class)->create();
        $ip = ImpactedProcess::find($data->id);
        $this->assertInstanceOf(Model::class, $ip);
        $this->assertTrue($ip->delete());
    }

    public function testSeletNcbyImpactedProcess(): void
    {
        $data = factory(ImpactedProcess::class)->create();
        $this->assertInstanceOf(Nonconformity::class, $data->nonconformity);
    }

    public function testSeletProcessbyImpactedProcess(): void
    {
        $data = factory(ImpactedProcess::class)->create();
        $this->assertInstanceOf(Process::class, $data->process);
    }
}
