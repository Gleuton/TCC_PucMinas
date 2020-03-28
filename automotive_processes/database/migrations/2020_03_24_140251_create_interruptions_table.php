<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterruptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('interruptions', static function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('description');
            $table->integer('work_shift');

            $table->uuid('interruption_type_id');
            $table->foreign('interruption_type_id')
                ->references('id')
                ->on('interruption_types');

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
        Schema::dropIfExists('users');
    }
}
