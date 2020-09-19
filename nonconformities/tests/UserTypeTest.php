<?php

use App\Models\UserType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Testing\DatabaseMigrations;

class UserTypeTest extends TestCase
{
    use DatabaseMigrations;


    public function testInsertUserType(): void
    {
        $data = factory(UserType::class)->create();
        self::assertInstanceOf(Model::class, $data);
    }

    public function testSelectUserType(): void
    {
        $data = factory(UserType::class, 6)->create();
        self::assertInstanceOf(Collection::class, $data);
        self::assertCount(6, $data);
    }

    public function testSelectOneUserType(): void
    {
        $data = factory(UserType::class)->create();
        $user_type = UserType::find($data->id);
        self::assertInstanceOf(Model::class, $user_type);
    }

    public function testDeleteUserType(): void
    {
        $data = factory(UserType::class)->create();
        $user_type = UserType::find($data->id);
        self::assertInstanceOf(Model::class, $user_type);
        self::assertTrue($user_type->delete());
    }

    public function testUpdateUserType(): void
    {
        $update = ['type' => 'user'];
        $data = factory(UserType::class)->create();
        $user_type = UserType::find($data->id);
        self::assertInstanceOf(Model::class, $user_type);
        self::assertTrue($user_type->update($update));
        $user_type = UserType::find($data->id)->toArray();
        self::assertEquals($user_type['type'], $update['type']);
    }

    public function testSelectUserByUserType(): void
    {
        $data = factory(UserType::class)->create();
        self::assertInstanceOf(Collection::class, $data->users);
    }
}
