<?php

use Faker\Provider\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB, Hash};
use Illuminate\Support\Str;

class UserTypeTableSeeder extends Seeder
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
    }
}
