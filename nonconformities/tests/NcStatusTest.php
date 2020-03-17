<?php

use App\Models\NcStatus;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class NcStatusTest extends TestCase
{
    use DatabaseMigrations;

    public function testPostStatus(): void
    {
        $response = $this->post('api/nc_status', ['status' => 'Sallys'])
            ->seeJsonStructure(
                [
                    'id',
                    'status',
                    'created_at',
                ]
            )->response;
        $this->assertEquals(201, $response->status());
    }

    public function testGetStatus(): void
    {
        factory(NcStatus::class, 6)->create();
        $data = NcStatus::all()->toArray();

        $response = $this->get('api/nc_status')
            ->seeJson($data[0])->response;
        $this->assertEquals(200, $response->status());
    }

    public function testGetOneStatus(): void
    {
        factory(NcStatus::class)->create();
        $data = NcStatus::all()->first()->toArray();

        $response = $this->get('api/nc_status/' . $data['id'])
            ->seeJson($data)->response;
        $this->assertEquals(200, $response->status());
    }

    public function testDeleteStatus(): void
    {
        factory(NcStatus::class)->create();
        $data = NcStatus::all()->first()->toArray();
        $response = $this->delete('api/nc_status/' . $data['id'])->response;
        $this->assertEquals(204, $response->status());
    }
}
