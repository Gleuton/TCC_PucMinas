<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpactedProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('impacted_processes', static function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('id_nonconformity');
            $table->foreign('id_nonconformity')
                ->references('id')
                ->on('nonconformities');

            $table->uuid('id_process');
            $table->foreign('id_process')
                ->references('id')
                ->on('processes');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('impacted_processes');
    }
}
