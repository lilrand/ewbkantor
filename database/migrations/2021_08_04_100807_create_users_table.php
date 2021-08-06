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
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches');

            $table->uuid('division_id');
            $table->foreign('division_id')->references('id')->on('divisions');

            $table->uuid('level_id');
            $table->foreign('level_id')->references('id')->on('levels');

            $table->string('username');
            $table->string('name');
            $table->string('password');
            $table->string('confirm_password');
            $table->string('email');
            $table->string('phone');
            $table->enum('status', ["ACTIVE", "INACTIVE"]);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
