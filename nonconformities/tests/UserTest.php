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

    public function testPostUser(): void
    {
        $userType = Uuid::uuid();
        factory(UserType::class)->create(['id' => $userType]);

        $user = [
            'name'         => 'Jose',
            'login'        => 'jose.lopes@dutra.com',
            'password'     => Hash::make('senha'),
            'user_type_id' => $userType
        ];
        $response = $this->post('api/user', $user)
            ->seeJson(
                $user
            )->response;
        $this->assertEquals(201, $response->status());
    }

    public function testGetUser(): void
    {
        factory(User::class, 6)->create();
        $data = User::all()->toArray();

        $response = $this->get('api/user')
            ->seeJson($data[0])->response;
        $this->assertEquals(200, $response->status());
    }

    public function testGetOneUser(): void
    {
        factory(User::class)->create();
        $data = User::all()->first()->toArray();

        $response = $this->get('api/user/' . $data['id'])
            ->seeJson($data)->response;
        $this->assertEquals(200, $response->status());
    }

    public function testDeleteUser(): void
    {
        factory(User::class)->create();
        $data = User::all()->first()->toArray();
        $response = $this->delete('api/user/' . $data['id'])->response;
        $this->assertEquals(204, $response->status());
    }

    public function testUpdateUser(): void
    {
        $update = ['name' => 'Nome'];
        factory(User::class)->create();
        $data = User::all()->first()->toArray();
        $response = $this->put('api/user/' . $data['id'], $update)
            ->seeJson($update)
            ->response;
        $this->assertEquals(200, $response->status());
    }

    public function testGetUserTypeByUser(): void
    {
        $userTypeId = Uuid::uuid();
        $userId = Uuid::uuid();
        factory(UserType::class)->create(['id' => $userTypeId]);
        factory(User::class)->create(
            ['id' => $userId, 'user_type_id' => $userTypeId]
        );

        $user = User::find($userId);
        $this->assertEquals($userTypeId, $user->userType->id);
    }
}
