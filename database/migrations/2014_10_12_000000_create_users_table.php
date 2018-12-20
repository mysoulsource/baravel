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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('country')->nullable();
            $table->string('zone')->nullable();
            $table->string('district')->nullable();
            $table->string('area')->nullable();
            $table->string('phone')->nullable();
            $table->integer('age')->nullable();
            $table->string('blood')->nullable();
            $table->string('f_url')->nullable();
            $table->integer('status')->default(1);
            $table->integer('info_status')->default(0);
            $table->string('img')->default('profile.png');
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
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
