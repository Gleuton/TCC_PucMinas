<?php

use App\Models\User;
use App\Models\UserType;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function testInsertUser(): void
    {
        $user = factory(User::class)
            ->make()
            ->toArray();
        self::assertIsArray($user);
        self::assertNotEmpty($user);
    }

    public function testSelectUsers(): void
    {
        factory(User::class, 6)->create();
        $users = User::all();

        self::assertInstanceOf(Collection::class, $users);
        self::assertCount(6, $users);
    }

    public function testSelectOneUser(): void
    {
        factory(User::class)->create();
        $user = User::all()->first();

        self::assertInstanceOf(Model::class, $user);
    }

    public function testDeleteUser(): void
    {
        factory(User::class)->create();
        $user = User::all()->first();
        self::assertInstanceOf(Model::class, $user);
        self::assertTrue($user->delete());
    }

    public function testUpdateUser(): void
    {
        $update = ['name' => 'Nome'];
        factory(User::class)->create();
        $user = User::all()->first();
        self::assertInstanceOf(Model::class, $user);
        self::assertTrue($user->update($update));
    }

    public function testGetUserTypeByUser(): void
    {
        $user = factory(User::class)->create();
        self::assertNotEmpty($user->userType->id);
    }
}
