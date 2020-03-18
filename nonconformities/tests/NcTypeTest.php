<?php

use App\Models\NcType;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class NcTypeTest extends TestCase
{
    use DatabaseMigrations;

    public function testPostNcType(): void
    {
        $data = ['type' => 'tipo'];
        $response = $this->post('api/nc_type', $data)
            ->seeJson($data)->response;
        $this->assertEquals(201, $response->status());
    }

    public function testGetNcTypes(): void
    {
        factory(NcType::class, 6)->create();
        $data = NcType::all()->toArray();

        $response = $this->get('api/nc_type')
            ->seeJson($data[0])->response;
        $this->assertEquals(200, $response->status());
    }

    public function testGetOneNcType(): void
    {
        factory(NcType::class)->create();
        $data = NcType::all()->first()->toArray();

        $response = $this->get('api/nc_type/' . $data['id'])
            ->seeJson($data)->response;
        $this->assertEquals(200, $response->status());
    }

    public function testDeleteNcType(): void
    {
        factory(NcType::class)->create();
        $data = NcType::all()->first()->toArray();
        $response = $this->delete('api/nc_type/' . $data['id'])->response;
        $this->assertEquals(204, $response->status());
    }
    public function testUpdateNcType(): void
    {
        $update = ['type' => 'a fazer'];
        factory(NcType::class)->create();
        $data = NcType::all()->first()->toArray();
        $response = $this->put('api/nc_type/' . $data['id'], $update)
            ->seeJson($update)
            ->response;
        $this->assertEquals(200, $response->status());
    }
}
