<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request', function (Blueprint $table) {
            $table->string('date');
            $table->integer('urgency');
            $table->longText('message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('request', function (Blueprint $table) {
            Schema::dropIfExists('date');
            Schema::dropIfExists('urgency');
            Schema::dropIfExists('message');
        });
    }
}
