<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', static function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('login')->unique();
            $table->string('password');
            $table->text('api_token')->nullable();
            $table->timestamp('api_token_expiration')->nullable();

            $table->uuid('user_type_id');
            $table->foreign('user_type_id')
                ->references('id')
                ->on('user_types');

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
