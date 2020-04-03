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
        $this->assertInstanceOf(Model::class, $data);
    }

    public function testSelectUserType(): void
    {
        $data = factory(UserType::class, 6)->create();
        $this->assertInstanceOf(Collection::class, $data);
        $this->assertCount(6, $data);
    }

    public function testSelectOneUserType(): void
    {
        $data = factory(UserType::class)->create();
        $user_type = UserType::find($data->id);
        $this->assertInstanceOf(Model::class, $user_type);
    }

    public function testDeleteUserType(): void
    {
        $data = factory(UserType::class)->create();
        $user_type = UserType::find($data->id);
        $this->assertInstanceOf(Model::class, $user_type);
        $this->assertTrue($user_type->delete());
    }

    public function testUpdateUserType(): void
    {
        $update = ['type' => 'user'];
        $data = factory(UserType::class)->create();
        $user_type = UserType::find($data->id);
        $this->assertInstanceOf(Model::class, $user_type);
        $this->assertTrue($user_type->update($update));
        $user_type = UserType::find($data->id)->toArray();
        $this->assertEquals($user_type['type'], $update['type']);
    }

    public function testSeletUserByUserType(): void
    {
        $data = factory(UserType::class)->create();
        $this->assertInstanceOf(Collection::class, $data->users);
    }
}
