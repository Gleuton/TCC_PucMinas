<?php

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTypeTest extends TestCase
{
    use DatabaseMigrations;
    public function testInsertUserType(): void
    {
        $user_type = factory(UserType::class)
            ->make()
            ->toArray();
        $this->assertIsArray($user_type);
        $this->assertNotEmpty($user_type);
    }

    public function testSelectUserTypes(): void
    {
        factory(UserType::class, 6)->create();
        $users_type = UserType::all();

        $this->assertInstanceOf(Collection::class, $users_type);
        $this->assertCount(6, $users_type);
    }

    public function testSelectOneUserType(): void
    {
        factory(UserType::class)->create();
        $user_type = UserType::all()->first();

        $this->assertInstanceOf(Model::class, $user_type);
    }

    public function testDeleteUserType(): void
    {
        factory(UserType::class)->create();
        $user_type = UserType::all()->first();
        $this->assertInstanceOf(Model::class, $user_type);
        $this->assertTrue($user_type->delete());
    }

    public function testUpdateUserType(): void
    {
        $update = ['type' => 'Nome'];
        factory(UserType::class)->create();
        $user_type = UserType::all()->first();
        $this->assertInstanceOf(Model::class, $user_type);
        $this->assertTrue($user_type->update($update));
    }

    public function testGetUserByUserType(): void
    {
        $userType = factory(UserType::class)->create();
        factory(User::class)->create(['user_type_id' => $userType->id]);

        $this->assertInstanceOf(Collection::class, $userType->users);
    }
}
