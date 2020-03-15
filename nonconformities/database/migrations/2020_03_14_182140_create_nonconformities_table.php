<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonconformitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'nonconformities',
            static function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('description');
                $table->string('solution');
                $table->string('standard');

                $table->uuid('id_user');
                $table->foreign('id_user')
                    ->references('id')
                    ->on('users');

                $table->uuid('id_type');
                $table->foreign('id_type')
                    ->references('id')
                    ->on('nc_types');

                $table->uuid('id_status');
                $table->foreign('id_status')
                    ->references('id')
                    ->on('nc_status');

                $table->uuid('id_process');
                $table->foreign('id_process')
                    ->references('id')
                    ->on('processes');

                $table->timestamps();
                $table->softDeletes();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('nonconformities');
    }
}
