<?php

use App\Models\Process;
use Illuminate\Database\Seeder;

class ProcessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /** @var Process $type_id */

        factory(Process::class)->create(
            ['name' => 'Estruturação']
        );
        factory(Process::class)->create(
            ['name' => 'Pintura']
        );
        factory(Process::class)->create(
            ['name' => 'Montagem']
        );
    }
}
