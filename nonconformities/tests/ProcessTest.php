<?php

use App\Models\Process;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ProcessTest extends TestCase
{
    use DatabaseMigrations;

    public function testPostprocess(): void
    {
        $data = ['name' => 'Sallys'];
        $response = $this->post('api/process', $data)
            ->seeJson(
                $data
            )->response;
        $this->assertEquals(201, $response->status());
    }

    public function testGetprocess(): void
    {
        factory(Process::class, 6)->create();
        $data = Process::all()->toArray();

        $response = $this->get('api/process')
            ->seeJson($data[0])->response;
        $this->assertEquals(200, $response->status());
    }

    public function testGetOneprocess(): void
    {
        factory(Process::class)->create();
        $data = Process::all()->first()->toArray();

        $response = $this->get('api/process/' . $data['id'])
            ->seeJson($data)->response;
        $this->assertEquals(200, $response->status());
    }

    public function testDeleteprocess(): void
    {
        factory(Process::class)->create();
        $data = Process::all()->first()->toArray();
        $response = $this->delete('api/process/' . $data['id'])->response;
        $this->assertEquals(204, $response->status());
    }

    public function testUpdateprocess(): void
    {
        $update = ['name' => 'inativo'];
        factory(Process::class)->create();
        $data = Process::all()->first()->toArray();
        $response = $this->put('api/process/' . $data['id'], $update)
            ->seeJson($update)
            ->response;
        $this->assertEquals(200, $response->status());
    }
}
