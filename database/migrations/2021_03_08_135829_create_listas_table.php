<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('organo_id')->constrained();
            $table->string('nome');
            $table->unique(['organo_id', 'nome']);
            $table->integer('seggi_pieni');
            $table->integer('resti');
            $table->integer('seggi_ai_resti');
            $table->integer('seggi_totali');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listas');
    }
}
