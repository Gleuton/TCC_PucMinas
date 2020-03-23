<?php

use App\Models\Process;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ProcessTest extends TestCase
{
    use DatabaseMigrations;

    public function testPostProcess(): void
    {
        $data = factory(Process::class)->make()->toArray();
        $response = $this->post('api/process', $data)
            ->seeJson(
                $data
            )->response;
        $this->assertEquals(201, $response->status());
    }

    public function testGetProcess(): void
    {
        $data = factory(Process::class, 6)->create()->toArray();
        $response = $this->get('api/process')
            ->seeJson($data[0])->response;
        $this->assertEquals(200, $response->status());
    }

    public function testGetOneProcess(): void
    {
        $data = factory(Process::class)->create()->toArray();
        $response = $this->get('api/process/' . $data['id'])
            ->seeJson($data)->response;
        $this->assertEquals(200, $response->status());
    }

    public function testDeleteProcess(): void
    {
        $data = factory(Process::class)->create()->toArray();
        $response = $this->delete('api/process/' . $data['id'])->response;
        $this->assertEquals(204, $response->status());
    }

    public function testUpdateProcess(): void
    {
        $update = ['name' => 'inativo'];
        $data = factory(Process::class)->create()->toArray();
        $response = $this->put('api/process/' . $data['id'], $update)
            ->seeJson($update)
            ->response;
        $this->assertEquals(200, $response->status());
    }
}
