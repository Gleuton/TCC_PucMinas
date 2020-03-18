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

                $table->uuid('user_id');
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users');

                $table->uuid('type_id');
                $table->foreign('type_id')
                    ->references('id')
                    ->on('nc_types');

                $table->uuid('status_id');
                $table->foreign('status_id')
                    ->references('id')
                    ->on('nc_status');

                $table->uuid('process_id');
                $table->foreign('process_id')
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
