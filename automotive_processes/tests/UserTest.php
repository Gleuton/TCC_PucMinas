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
        $this->assertInstanceOf(Model::class, $data);
    }

    public function testSelectUser(): void
    {
        $data = factory(User::class, 6)->create();
        $this->assertInstanceOf(Collection::class, $data);
        $this->assertCount(6, $data);
    }

    public function testSelectOneUser(): void
    {
        $data = factory(User::class)->create();
        $user = User::find($data->id);
        $this->assertInstanceOf(Model::class, $user);
    }

    public function testDeleteUser(): void
    {
        $data = factory(User::class)->create();
        $user = User::find($data->id);
        $this->assertInstanceOf(Model::class, $user);
        $this->assertTrue($user->delete());
    }

    public function testUpdateUser(): void
    {
        $update = ['name' => 'jose'];
        $data = factory(User::class)->create();
        $user = User::find($data->id);
        $this->assertInstanceOf(Model::class, $user);
        $this->assertTrue($user->update($update));
        $user = User::find($data->id)->toArray();
        $this->assertEquals($user['name'], $update['name']);
    }

    public function testSeletNcByUser(): void
    {
        $data = factory(User::class)->create();
        $this->assertInstanceOf(Collection::class, $data->nonconformities);
    }
    public function testSeletUserTypeByUser(): void
    {
        $data = factory(User::class)->create();
        $this->assertInstanceOf(UserType::class, $data->userType);
    }
}
