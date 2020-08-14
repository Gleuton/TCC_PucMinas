<?php

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /** @var UserType $type_id */
        $type_id = DB::table('user_types')->select(['id'])
            ->where('type', '=', 'Administrador')
            ->first();

        factory(User::class)->create(
            [
                'user_type_id' => $type_id->id,
                'login'        => 'admin@admin.com'
            ]
        );
    }
}
