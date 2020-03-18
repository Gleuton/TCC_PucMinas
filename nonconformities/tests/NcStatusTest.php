<?php

use App\Models\NcStatus;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class NcStatusTest extends TestCase
{
    use DatabaseMigrations;

    public function testPostStatus(): void
    {
        $data = ['status' => 'Sallys'];
        $response = $this->post('api/nc_status', $data)
            ->seeJson(
                $data
            )->response;
        $this->assertEquals(201, $response->status());
    }

    public function testGetStatus(): void
    {
        $ncStatus = factory(NcStatus::class, 6)->make();
        $data = $ncStatus->toArray();
        $ncStatus->each(
            static function ($m){
            $m->save();
        });
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

    public function testUpdateStatus(): void
    {
        $update = ['status' => 'inativo'];
        factory(NcStatus::class)->create();
        $data = NcStatus::all()->first()->toArray();
        $response = $this->put('api/nc_status/' . $data['id'], $update)
            ->seeJson($update)
            ->response;
        $this->assertEquals(200, $response->status());
    }
}
