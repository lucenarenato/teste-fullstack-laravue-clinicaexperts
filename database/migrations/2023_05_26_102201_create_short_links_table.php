<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShortLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_links', function (Blueprint $table) {
            $table->id();
            $table->string('Identificacao')->unique()->nullable();
            $table->string('l_cod', 64)->unique();
            $table->string('l_link');
            $table->timestamps();
        });

        Schema::create('access_log', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->nullable();
            $table->timestamp('data')->nullable(); // $table->date('data')->nullable();
            $table->string('pais')->nullable();
            $table->string('continente')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('cidade')->nullable();
            $table->string('user_agente')->nullable();
            $table->integer('num_acessos')->nullable();
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
        Schema::dropIfExists('short_links');
        Schema::dropIfExists('access_log');
    }
}
