<?php

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function testInsertUser(): void
    {
        $data = factory(User::class)->create();
        self::assertInstanceOf(Model::class, $data);
    }

    public function testSelectUser(): void
    {
        $data = factory(User::class, 6)->create();
        self::assertInstanceOf(Collection::class, $data);
        self::assertCount(6, $data);
    }

    public function testSelectOneUser(): void
    {
        $data = factory(User::class)->create();
        $user = User::find($data->id);
        self::assertInstanceOf(Model::class, $user);
    }

    public function testDeleteUser(): void
    {
        $data = factory(User::class)->create();
        $user = User::find($data->id);
        self::assertInstanceOf(Model::class, $user);
        self::assertTrue($user->delete());
    }

    public function testUpdateUser(): void
    {
        $update = ['name' => 'jose'];
        $data = factory(User::class)->create();
        $user = User::find($data->id);
        self::assertInstanceOf(Model::class, $user);
        self::assertTrue($user->update($update));
        $user = User::find($data->id)->toArray();
        self::assertEquals($user['name'], $update['name']);
    }

    public function testSeletNcByUser(): void
    {
        $data = factory(User::class)->create();
        self::assertInstanceOf(Collection::class, $data->nonconformities);
    }
    public function testSeletUserTypeByUser(): void
    {
        $data = factory(User::class)->create();
        self::assertInstanceOf(UserType::class, $data->userType);
    }
}
