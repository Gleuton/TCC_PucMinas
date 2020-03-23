<?php

use App\Models\NcStatus;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class NcStatusTest extends TestCase
{
    use DatabaseMigrations;

    public function testPostStatus(): void
    {
        $data = factory(NcStatus::class)->make()->toArray();
        $response = $this->post('api/nc_status', $data)
            ->seeJson(
                $data
            )->response;
        $this->assertEquals(201, $response->status());
    }

    public function testGetStatus(): void
    {
        $data = factory(NcStatus::class, 6)->create()->toArray();
        $response = $this->get('api/nc_status')
            ->seeJson($data[0])->response;
        $this->assertEquals(200, $response->status());
    }

    public function testGetOneStatus(): void
    {
        $data = factory(NcStatus::class)->create()->toArray();
        $response = $this->get('api/nc_status/' . $data['id'])
            ->seeJson($data)->response;
        $this->assertEquals(200, $response->status());
    }

    public function testDeleteStatus(): void
    {
        $data = factory(NcStatus::class)->create()->toArray();
        $response = $this->delete('api/nc_status/' . $data['id'])->response;
        $this->assertEquals(204, $response->status());
    }

    public function testUpdateStatus(): void
    {
        $update = ['status' => 'inativo'];
        $data = factory(NcStatus::class)->create()->toArray();
        $response = $this->put('api/nc_status/' . $data['id'], $update)
            ->seeJson($update)
            ->response;
        $this->assertEquals(200, $response->status());
    }
}
