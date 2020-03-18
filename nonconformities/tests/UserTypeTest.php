<?php

use App\Models\UserType;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTypeTest extends TestCase
{
    use DatabaseMigrations;

    public function testPostUserType(): void
    {
        $data = ['type' => 'user'];
        $response = $this->post('api/user_type', $data)
            ->seeJson(
                $data
            )->response;
        $this->assertEquals(201, $response->status());
    }

    public function testGetUserType(): void
    {
        factory(UserType::class, 6)->create();
        $data = UserType::all()->toArray();

        $response = $this->get('api/user_type')
            ->seeJson($data[0])->response;
        $this->assertEquals(200, $response->status());
    }

    public function testGetOneUserType(): void
    {
        factory(UserType::class)->create();
        $data = UserType::all()->first()->toArray();

        $response = $this->get('api/user_type/' . $data['id'])
            ->seeJson($data)->response;
        $this->assertEquals(200, $response->status());
    }

    public function testDeleteUserType(): void
    {
        factory(UserType::class)->create();
        $data = UserType::all()->first()->toArray();
        $response = $this->delete('api/user_type/' . $data['id'])->response;
        $this->assertEquals(204, $response->status());
    }

    public function testUpdateUserType(): void
    {
        $update = ['type' => 'admin'];
        factory(UserType::class)->create();
        $data = UserType::all()->first()->toArray();
        $response = $this->put('api/user_type/' . $data['id'], $update)
            ->seeJson($update)
            ->response;
        $this->assertEquals(200, $response->status());
    }
}
