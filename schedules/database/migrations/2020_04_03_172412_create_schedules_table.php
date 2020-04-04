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

                $table->uuid('schedule_type_id')->nullable();
                $table->foreign('schedule_type_id')
                    ->references('id')
                    ->on('schedule_types');

                $table->uuid('schedule_status_id');
                $table->foreign('schedule_status_id')
                    ->references('id')
                    ->on('schedule_status');

                $table->uuid('scheduler_id');
                $table->foreign('scheduler_id')
                    ->references('id')
                    ->on('users');

                $table->uuid('performer_id')->nullable();
                $table->foreign('performer_id')
                    ->references('id')
                    ->on('users');

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
