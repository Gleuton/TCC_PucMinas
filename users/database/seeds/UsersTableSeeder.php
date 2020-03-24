<?php

use Faker\Provider\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB, Hash};
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $type_id = Uuid::uuid();
        DB::table('user_types')->insert(
            [
                'id'   => $type_id,
                'type' => 'Administrador'
            ]
        );

        DB::table('users')->insert(
            [
                'id'           => Uuid::uuid(),
                'name'         => Str::random(10),
                'login'        => Str::random(10) . '@gmail.com',
                'password'     => Hash::make('senha'),
                'user_type_id' => $type_id,
            ]
        );
    }
}
