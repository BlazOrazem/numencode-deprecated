<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('nickname')->nullable()->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('avatar', 255)->nullable();
            $table->string('avatar_thumbnail', 255)->nullable();
            $table->boolean('is_verified')->default(false);
            $table->string('token', 30)->nullable();
            $table->string('social_provider_type', 100)->nullable();
            $table->string('social_provider_id')->nullable();
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
        Schema::drop('users');
    }
}
