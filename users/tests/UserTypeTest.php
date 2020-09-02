<?php

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;

class UserTypeTest extends TestCase
{
    use DatabaseMigrations;
    public function testInsertUserType(): void
    {
        $user_type = factory(UserType::class)
            ->make()
            ->toArray();
        self::assertIsArray($user_type);
        self::assertNotEmpty($user_type);
    }

    public function testSelectUserTypes(): void
    {
        factory(UserType::class, 6)->create();
        $users_type = UserType::all();

        self::assertInstanceOf(Collection::class, $users_type);
        self::assertCount(6, $users_type);
    }

    public function testSelectOneUserType(): void
    {
        factory(UserType::class)->create();
        $user_type = UserType::all()->first();

        self::assertInstanceOf(Model::class, $user_type);
    }

    public function testDeleteUserType(): void
    {
        factory(UserType::class)->create();
        $user_type = UserType::all()->first();
        self::assertInstanceOf(Model::class, $user_type);
        self::assertTrue($user_type->delete());
    }

    public function testUpdateUserType(): void
    {
        $update = ['type' => 'Nome'];
        factory(UserType::class)->create();
        $user_type = UserType::all()->first();
        self::assertInstanceOf(Model::class, $user_type);
        self::assertTrue($user_type->update($update));
    }

    public function testGetUserByUserType(): void
    {
        $userType = factory(UserType::class)->create();
        factory(User::class)->create(['user_type_id' => $userType->id]);

        self::assertInstanceOf(Collection::class, $userType->users);
    }
}
