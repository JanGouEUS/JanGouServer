<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabernasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabernas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('idTaberna');
            $table->string('key');
            $table->string('timeKey');
            $table->string('admin');
            $table->string('name');
            $table->string('address');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('web')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('imagelink')->nullable();
            $table->string('logolink')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabernas');
    }
}
