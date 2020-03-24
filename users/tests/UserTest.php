<?php

use App\Models\User;
use App\Models\UserType;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseMigrations;
    private string $uri = 'api/user/';
    public function testPostUser(): void
    {
        $userType = factory(UserType::class)->create();
        $user = factory(User::class)
            ->make(['user_type_id' => $userType->id])
            ->toArray();
        unset($user['password']);
        $userReturn = $user;
        $user['password'] = 'senha123';
        $user['password_confirmation'] = 'senha123';
        $response = $this->post($this->uri, $user)
            ->seeJsonContains(
                $userReturn
            )->response;
        $this->assertEquals(201, $response->status());
    }

    public function testGetUser(): void
    {
        factory(User::class, 6)->create();
        $data = User::all()->toArray();

        $response = $this->get($this->uri)
            ->seeJson($data[0])->response;
        $this->assertEquals(200, $response->status());
    }

    public function testGetOneUser(): void
    {
        factory(User::class)->create();
        $data = User::all()->first()->toArray();

        $response = $this->get($this->uri . $data['id'])
            ->seeJson($data)->response;
        $this->assertEquals(200, $response->status());
    }

    public function testDeleteUser(): void
    {
        factory(User::class)->create();
        $data = User::all()->first()->toArray();
        $response = $this->delete($this->uri . $data['id'])->response;
        $this->assertEquals(204, $response->status());
    }

    public function testUpdateUser(): void
    {
        $update = ['name' => 'Nome'];
        factory(User::class)->create();
        $data = User::all()->first()->toArray();
        $response = $this->put($this->uri . $data['id'], $update)
            ->seeJson($update)
            ->response;
        $this->assertEquals(200, $response->status());
    }

    public function testGetUserTypeByUser(): void
    {
        $user = factory(User::class)->create();

        $this->assertNotEmpty($user->userType->id);
    }
}
