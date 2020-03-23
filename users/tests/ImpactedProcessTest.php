<?php

use App\Models\ImpactedProcess;
use Faker\Provider\Uuid;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ImpactedProcessTest extends TestCase
{
    use DatabaseMigrations;
    private string $uri = 'api/impacted_process/';
    public function testPostNcWithoutData(): void
    {
        $data = [];
        $response = $this->post($this->uri, $data)
            ->seeJson(
                $data
            )->response;
        $this->assertEquals(422, $response->status());
    }

    public function testPostNcWithoutNonconformity(): void
    {
        $data = factory(ImpactedProcess::class)->make()->toArray();
        unset($data['nonconformity_id']);
        $response = $this->post($this->uri, $data)
            ->seeJson(
                ['nonconformity_id' =>['The nonconformity id field is required.']]
            )->response;
        $this->assertEquals(422, $response->status());
    }

    public function testPostNcWithData(): void
    {
        $data = factory(ImpactedProcess::class)->make()->toArray();
        $response = $this->post($this->uri, $data)
            ->seeJson(
                $data
            )->response;

        $this->assertEquals(201, $response->status());
    }
    public function testGetNonconformities(): void
    {
        $data = factory(ImpactedProcess::class, 6)->create()->toArray();
        $response = $this->get($this->uri)
            ->seeJson($data[0])->response;
        $this->assertEquals(200, $response->status());
    }

    public function testGetOneImpactedProcess(): void
    {
        $data = factory(ImpactedProcess::class)->create()->toArray();
        $response = $this->get($this->uri. $data['id'])
            ->seeJson($data)->response;
        $this->assertEquals(200, $response->status());
    }

    public function testDeleteImpactedProcess(): void
    {
        $data = factory(ImpactedProcess::class)->create()->toArray();
        $response = $this->delete($this->uri . $data['id'])->response;
        $this->assertEquals(204, $response->status());
    }

    public function testUpdateImpactedProcess(): void
    {
        $update = ['nonconformity_id' => Uuid::uuid()];
        $data = factory(ImpactedProcess::class)->create()->toArray();
        $response = $this->put($this->uri . $data['id'], $update)
            ->seeJson($update)
            ->response;
        $this->assertEquals(200, $response->status());
    }

    public function testUpdateImpactedProcessWithEmptyFields(): void
    {
        $update = [
            'nonconformity_id' => ''
        ];
        $data = factory(ImpactedProcess::class)->create()->toArray();
        $response = $this->put($this->uri . $data['id'], $update)
            ->seeJson(
                ['nonconformity_id' =>['The nonconformity id field is required.']]
            )
            ->response;
        $this->assertEquals(422, $response->status());
    }
}
