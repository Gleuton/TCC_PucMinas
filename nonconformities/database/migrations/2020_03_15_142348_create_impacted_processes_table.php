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

            $table->uuid('nonconformity_id');
            $table->foreign('nonconformity_id')
                ->references('id')
                ->on('nonconformities');

            $table->uuid('process_id');
            $table->foreign('process_id')
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
