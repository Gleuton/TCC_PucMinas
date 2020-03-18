<?php

use App\Models\UserType;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTypeTest extends TestCase
{
    use DatabaseMigrations;

    public function testPostUserType(): void
    {
        $data = factory(UserType::class)->make()->toArray();
        $response = $this->post('api/user_type', $data)
            ->seeJson(
                $data
            )->response;
        $this->assertEquals(201, $response->status());
    }

    public function testGetUserType(): void
    {
        $data = factory(UserType::class, 6)->create()->toArray();
        $response = $this->get('api/user_type')
            ->seeJson($data[0])->response;
        $this->assertEquals(200, $response->status());
    }

    public function testGetOneUserType(): void
    {
        $data = factory(UserType::class)->create()->toArray();
        $response = $this->get('api/user_type/' . $data['id'])
            ->seeJson($data)->response;
        $this->assertEquals(200, $response->status());
    }

    public function testDeleteUserType(): void
    {
        $data = factory(UserType::class)->create()->toArray();
        $response = $this->delete('api/user_type/' . $data['id'])->response;
        $this->assertEquals(204, $response->status());
    }

    public function testUpdateUserType(): void
    {
        $update = ['type' => 'admin'];
        $data = factory(UserType::class)->create()->toArray();
        $response = $this->put('api/user_type/' . $data['id'], $update)
            ->seeJson($update)
            ->response;
        $this->assertEquals(200, $response->status());
    }
}
