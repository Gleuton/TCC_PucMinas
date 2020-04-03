<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'schedules',
            static function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('scheduling');
                $table->text('description');
                $table->dateTime('scheduling_date');

                $table->uuid('nonconformity_id');
                $table->foreign('nonconformity_id')
                    ->references('id')
                    ->on('nonconformities');

                $table->uuid('scheduling_type_id');
                $table->foreign('scheduling_type_id')
                    ->references('id')
                    ->on('scheduling_types');

                $table->uuid('scheduling_status_id');
                $table->foreign('scheduling_status_id')
                    ->references('id')
                    ->on('scheduling_status');

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
        Schema::dropIfExists('schedules');
    }
}
