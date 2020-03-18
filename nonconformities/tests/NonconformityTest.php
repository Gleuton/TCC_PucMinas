<?php

use App\Models\Nonconformity;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class NonconformityTest extends TestCase
{
    use DatabaseMigrations;
    private string $uri = 'api/nonconformity/';
    public function testPostNcWithoutData(): void
    {
        $data = [

        ];
        $response = $this->post($this->uri, $data)
            ->seeJson(
                $data
            )->response;
        $this->assertEquals(422, $response->status());
    }

    public function testPostNcWithoutDescription(): void
    {
        $data = factory(Nonconformity::class)->make()->toArray();
        unset($data['description']);
        $response = $this->post($this->uri, $data)
            ->seeJson(
                ['description' =>['The description field is required.']]
            )->response;
        $this->assertEquals(422, $response->status());
    }

    public function testPostNcWithData(): void
    {
        $data = factory(Nonconformity::class)->make()->toArray();
        $response = $this->post($this->uri, $data)
            ->seeJson(
                $data
            )->response;

        $this->assertEquals(201, $response->status());
    }
    public function testGetNonconformities(): void
    {
        $data = factory(Nonconformity::class, 6)->create()->toArray();
        $response = $this->get($this->uri)
            ->seeJson($data[0])->response;
        $this->assertEquals(200, $response->status());
    }

    public function testGetOneNonconformity(): void
    {
        $data = factory(Nonconformity::class)->create()->toArray();
        $response = $this->get($this->uri. $data['id'])
            ->seeJson($data)->response;
        $this->assertEquals(200, $response->status());
    }

    public function testDeleteNonconformity(): void
    {
        $data = factory(Nonconformity::class)->create()->toArray();
        $response = $this->delete($this->uri . $data['id'])->response;
        $this->assertEquals(204, $response->status());
    }

    public function testUpdateNonconformity(): void
    {
        $update = ['description' => 'inativo'];
        $data = factory(Nonconformity::class)->create()->toArray();
        $response = $this->put($this->uri . $data['id'], $update)
            ->seeJson($update)
            ->response;
        $this->assertEquals(200, $response->status());
    }
}
