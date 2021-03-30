<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotilistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votilistas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('lista_id')->constrained();
            $table->unsignedBigInteger('seggio');
            $table->unique(['lista_id', 'seggio']);
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
        Schema::dropIfExists('votilistas');
    }
}
