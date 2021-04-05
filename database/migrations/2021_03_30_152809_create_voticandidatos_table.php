<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoticandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voticandidatos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('candidato_id')->constrained();
            $table->unsignedBigInteger('seggio');
            $table->unique(['candidato_id', 'seggio']);
            $table->integer('voti');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voticandidatos');
    }
}
