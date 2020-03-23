<?php

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Eloquent\Collection;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTypeTest extends TestCase
{
    use DatabaseMigrations;
    private string $uri = 'api/user_type/';

    public function testPostUserType(): void
    {
        $data = factory(UserType::class)->make()->toArray();
        $response = $this->post($this->uri, $data)
            ->seeJson(
                $data
            )->response;
        $this->assertEquals(201, $response->status());
    }

    public function testGetUserType(): void
    {
        $data = factory(UserType::class, 6)->create()->toArray();
        $response = $this->get($this->uri)
            ->seeJson($data[0])->response;
        $this->assertEquals(200, $response->status());
    }

    public function testGetOneUserType(): void
    {
        $data = factory(UserType::class)->create()->toArray();
        $response = $this->get($this->uri . $data['id'])
            ->seeJson($data)->response;
        $this->assertEquals(200, $response->status());
    }

    public function testDeleteUserType(): void
    {
        $data = factory(UserType::class)->create()->toArray();
        $response = $this->delete($this->uri . $data['id'])->response;
        $this->assertEquals(204, $response->status());
    }

    public function testUpdateUserType(): void
    {
        $update = ['type' => 'admin'];
        $data = factory(UserType::class)->create()->toArray();
        $response = $this->put($this->uri . $data['id'], $update)
            ->seeJson($update)
            ->response;
        $this->assertEquals(200, $response->status());
    }

    public function testGetUserByUserType(): void
    {
        $userType = factory(UserType::class)->create();
        factory(User::class)->create(['user_type_id' => $userType->id]);

        $this->assertTrue(($userType->users instanceof Collection));
    }
}
